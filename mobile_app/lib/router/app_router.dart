import 'package:flutter/material.dart';
import 'package:go_router/go_router.dart';
import 'package:flutter_riverpod/flutter_riverpod.dart';
import '../screens/auth/login_screen.dart';
import '../screens/main_screen.dart';
import '../screens/home/home_screen.dart';
import '../screens/inventory/inventory_screen.dart';
import '../screens/inventory/car_detail_screen.dart';
import '../screens/settings/settings_screen.dart';
import '../screens/about/about_screen.dart';
import '../screens/contact/contact_screen.dart';
import '../providers/auth_provider.dart';
import '../models/car.dart';

final routerProvider = Provider<GoRouter>((ref) {
  final authState = ref.watch(authProvider);

  return GoRouter(
    initialLocation: '/',
    redirect: (context, state) {
      final isLoggedIn = authState.user != null;
      final isLoginRoute = state.matchedLocation == '/login';

      if (!isLoggedIn && !isLoginRoute) return '/login';
      if (isLoggedIn && isLoginRoute) return '/';
      return null;
    },
    routes: [
      GoRoute(path: '/login', builder: (context, state) => const LoginScreen()),
      ShellRoute(
        builder: (context, state, child) => MainScreen(child: child),
        routes: [
          GoRoute(path: '/', builder: (context, state) => const HomeScreen()),
          GoRoute(
            path: '/inventory',
            builder: (context, state) => const InventoryScreen(),
            routes: [
              GoRoute(
                path: 'car/:id',
                builder: (context, state) {
                  final carIdStr = state.pathParameters['id']!;
                  final carId = int.tryParse(carIdStr) ?? 0;
                  // Pass extra object if available to avoid refetching
                  final carObj = state.extra as Car?;
                  return CarDetailScreen(carId: carId, car: carObj);
                },
              ),
            ],
          ),
          GoRoute(
            path: '/favorites',
            // Temporarily reuse Inventory or Placeholder
            builder: (context, state) => const Scaffold(
              body: Center(child: Text('Favorites (Coming Soon)')),
            ),
          ),
          GoRoute(
            path: '/settings',
            builder: (context, state) => const SettingsScreen(),
          ),
        ],
      ),
      // Independent Routes (Modals or Fullscreen)
      GoRoute(path: '/about', builder: (context, state) => const AboutScreen()),
      GoRoute(
        path: '/contact',
        builder: (context, state) => const ContactScreen(),
      ),
    ],
  );
});
