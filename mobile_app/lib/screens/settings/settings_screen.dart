import 'package:flutter/material.dart';
import 'package:flutter_riverpod/flutter_riverpod.dart';
import 'package:geolocator/geolocator.dart';
import '../../providers/auth_provider.dart';

class SettingsScreen extends ConsumerWidget {
  const SettingsScreen({super.key});

  @override
  Widget build(BuildContext context, WidgetRef ref) {
    return Scaffold(
      appBar: AppBar(title: const Text('SETTINGS')),
      body: ListView(
        children: [
          ListTile(
            title: const Text('Theme'),
            subtitle: const Text('System Default'),
            trailing: const Icon(Icons.brightness_auto),
            onTap: () {
              // TODO: Toggle Theme
            },
          ),
          ListTile(
            title: const Text('Biometrics'),
            trailing: Switch(value: false, onChanged: (val) {}),
          ),
          const Divider(),
          ListTile(
            title: const Text('Logout', style: TextStyle(color: Colors.red)),
            leading: const Icon(Icons.logout, color: Colors.red),
            onTap: () {
              ref.read(authProvider.notifier).logout();
            },
          ),
          const Divider(),
          ListTile(
            title: const Text('Ensure Location Access'),
            subtitle: const Text('Find nearest showroom'),
            leading: const Icon(Icons.location_on),
            onTap: () async {
              LocationPermission permission =
                  await Geolocator.checkPermission();
              if (permission == LocationPermission.denied) {
                permission = await Geolocator.requestPermission();
              }

              if (permission == LocationPermission.whileInUse ||
                  permission == LocationPermission.always) {
                final position = await Geolocator.getCurrentPosition();
                if (context.mounted) {
                  showDialog(
                    context: context,
                    builder: (c) => AlertDialog(
                      title: const Text('Current Location'),
                      content: Text(
                        'Lat: ${position.latitude}\nLong: ${position.longitude}',
                      ),
                      actions: [
                        TextButton(
                          onPressed: () => Navigator.pop(c),
                          child: const Text('OK'),
                        ),
                      ],
                    ),
                  );
                }
              }
            },
          ),
        ],
      ),
    );
  }
}
