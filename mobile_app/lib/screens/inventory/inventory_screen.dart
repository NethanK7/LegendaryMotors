import 'package:flutter/material.dart';
import 'package:flutter_riverpod/flutter_riverpod.dart';
import 'package:go_router/go_router.dart';
import '../../providers/inventory_provider.dart';

class InventoryScreen extends ConsumerWidget {
  const InventoryScreen({super.key});

  @override
  Widget build(BuildContext context, WidgetRef ref) {
    final inventoryState = ref.watch(inventoryProvider);

    return Scaffold(
      appBar: AppBar(
        title: const Text(
          'THE COLLECTION',
          style: TextStyle(fontWeight: FontWeight.w900, letterSpacing: 1.5),
        ),
        centerTitle: true,
        actions: [
          IconButton(
            icon: const Icon(Icons.refresh),
            onPressed: () => ref.refresh(inventoryProvider),
          ),
        ],
      ),
      body: inventoryState.when(
        loading: () => const Center(
          child: CircularProgressIndicator(color: Color(0xFFE30613)),
        ),
        error: (err, stack) => Center(
          child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              const Icon(Icons.error_outline, size: 48, color: Colors.red),
              const SizedBox(height: 16),
              Text('Error: $err', textAlign: TextAlign.center),
              TextButton(
                onPressed: () => ref.refresh(inventoryProvider),
                child: const Text('Retry'),
              ),
            ],
          ),
        ),
        data: (cars) {
          if (cars.isEmpty) {
            return const Center(child: Text("No cars available"));
          }
          return GridView.builder(
            padding: const EdgeInsets.all(16),
            gridDelegate: const SliverGridDelegateWithFixedCrossAxisCount(
              crossAxisCount: 1, // Single column for cinematic feel
              mainAxisSpacing: 24,
              childAspectRatio: 1.2,
            ),
            itemCount: cars.length,
            itemBuilder: (context, index) {
              final car = cars[index];
              return InkWell(
                onTap: () {
                  context.go('/inventory/details/${car.id}');
                },
                child: Container(
                  clipBehavior: Clip.antiAlias,
                  decoration: BoxDecoration(
                    color: const Color(0xFF111111),
                    border: Border.all(color: Colors.white.withOpacity(0.1)),
                  ),
                  child: Column(
                    crossAxisAlignment: CrossAxisAlignment.stretch,
                    children: [
                      Expanded(
                        child: car.imageUrl.isNotEmpty
                            ? Image.network(
                                car.imageUrl,
                                fit: BoxFit.cover,
                                errorBuilder: (c, o, s) => const Center(
                                  child: Icon(Icons.broken_image),
                                ),
                              )
                            : const Center(
                                child: Icon(Icons.directions_car, size: 48),
                              ),
                      ),
                      Padding(
                        padding: const EdgeInsets.all(16.0),
                        child: Column(
                          crossAxisAlignment: CrossAxisAlignment.start,
                          children: [
                            Text(
                              car.brand.toUpperCase(),
                              style: const TextStyle(
                                color: Color(0xFFE30613),
                                fontSize: 10,
                                fontWeight: FontWeight.bold,
                                letterSpacing: 2.0,
                              ),
                            ),
                            const SizedBox(height: 4),
                            Text(
                              car.model.toUpperCase(),
                              style: const TextStyle(
                                color: Colors.white,
                                fontSize: 18,
                                fontWeight: FontWeight.w900,
                                fontStyle: FontStyle.italic,
                              ),
                            ),
                            const SizedBox(height: 8),
                            Text(
                              '\$${car.price.toStringAsFixed(0)}', // Format nicely later
                              style: const TextStyle(
                                color: Colors.white70,
                                fontSize: 14,
                                letterSpacing: 1.0,
                              ),
                            ),
                          ],
                        ),
                      ),
                    ],
                  ),
                ),
              );
            },
          );
        },
      ),
    );
  }
}
