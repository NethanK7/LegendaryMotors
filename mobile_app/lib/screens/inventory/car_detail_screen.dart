import 'package:flutter/material.dart';
import '../../models/car.dart';

class CarDetailScreen extends StatelessWidget {
  final int carId;
  final Car? car;
  const CarDetailScreen({super.key, required this.carId, this.car});

  @override
  Widget build(BuildContext context) {
    // TODO: Fetch single car details or use passed object
    return Scaffold(
      appBar: AppBar(title: const Text('CONFIGURATION')),
      body: Center(child: Text('Car Details for ID: $carId')),
    );
  }
}
