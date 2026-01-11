import 'dart:io';
import 'package:flutter/foundation.dart';

class ApiConstants {
  static String get baseUrl {
    if (kIsWeb) return 'http://127.0.0.1:8000/api';
    // Android emulator localhost
    if (Platform.isAndroid) return 'http://10.0.2.2:8000/api';
    // iOS simulator localhost
    return 'http://127.0.0.1:8000/api';
  }

  static const String carsEndpoint = '/cars';
  static const String loginEndpoint = '/login';
  static const String registerEndpoint = '/register';
  static const String userEndpoint = '/user';
  static const String contactEndpoint = '/contact'; // NEW
  static const String favoritesEndpoint = '/favorites'; // NEW
  static const String checkoutEndpoint = '/checkout'; // NEW
}
