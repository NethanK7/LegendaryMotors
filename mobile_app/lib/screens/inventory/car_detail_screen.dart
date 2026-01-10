import 'package:flutter/material.dart';

class CarDetailScreen extends StatelessWidget {
  final int carId;
  const CarDetailScreen({super.key, required this.carId});

  @override
  Widget build(BuildContext context) {
    // TODO: Fetch single car details or use passed object
    return Scaffold(
      appBar: AppBar(title: const Text('CONFIGURATION')),
      body: Center(child: Text('Car Details for ID: $carId')),
    );
  }
}
