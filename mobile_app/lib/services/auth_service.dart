import 'package:shared_preferences/shared_preferences.dart';
import 'package:flutter_riverpod/flutter_riverpod.dart';
import '../api/api_client.dart';
import '../api/api_constants.dart';
import '../models/user.dart';

// Provider for the API Client
final apiClientProvider = Provider<ApiClient>((ref) => ApiClient());

// Provider for Auth Service
final authServiceProvider = Provider<AuthService>((ref) {
  return AuthService(ref.read(apiClientProvider));
});

class AuthService {
  final ApiClient _client;

  AuthService(this._client);

  Future<User> login(String email, String password) async {
    try {
      final response = await _client.dio.post(
        ApiConstants.loginEndpoint,
        data: {'email': email, 'password': password},
      );

      final userData = response.data['user'];
      final token = response.data['token'];

      // Combine user info and token
      final userMap = Map<String, dynamic>.from(userData);
      userMap['token'] = token;

      final user = User.fromJson(userMap);

      // Save token locally for persistence
      final prefs = await SharedPreferences.getInstance();
      await prefs.setString('auth_token', token);

      return user;
    } catch (e) {
      throw Exception('Login Failed: ${e.toString()}');
    }
  }

  Future<void> logout() async {
    final prefs = await SharedPreferences.getInstance();
    await prefs.remove('auth_token');
  }

  // Method to check if user is already logged in (check token)
  Future<bool> isLoggedIn() async {
    final prefs = await SharedPreferences.getInstance();
    return prefs.getString('auth_token') != null;
  }
}
