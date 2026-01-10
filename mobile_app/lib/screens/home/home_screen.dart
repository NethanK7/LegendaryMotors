import 'dart:async';
import 'package:flutter/material.dart';
import 'package:sensors_plus/sensors_plus.dart';

class HomeScreen extends StatefulWidget {
  const HomeScreen({super.key});

  @override
  State<HomeScreen> createState() => _HomeScreenState();
}

class _HomeScreenState extends State<HomeScreen> {
  double _x = 0;
  double _y = 0;
  StreamSubscription? _subscription;

  @override
  void initState() {
    super.initState();
    // Parallax Effect
    _subscription = accelerometerEventStream().listen((event) {
      setState(() {
        // Simple smoothing or just raw values
        // Clamp to avoid extreme movements
        _x = (event.x * 5).clamp(-20.0, 20.0);
        _y = (event.y * 5).clamp(-20.0, 20.0);
      });
    });
  }

  @override
  void dispose() {
    _subscription?.cancel();
    super.dispose();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: CustomScrollView(
        slivers: [
          SliverAppBar(
            expandedHeight: 300,
            floating: false,
            pinned: true,
            flexibleSpace: FlexibleSpaceBar(
              title: const Text(
                'LEGENDARY MOTORS',
                style: TextStyle(
                  fontWeight: FontWeight.w900,
                  letterSpacing: 1.2,
                  fontSize: 16,
                ),
              ),
              background: Stack(
                children: [
                  Container(color: Colors.black),
                  // Parallax Background
                  AnimatedPositioned(
                    duration: const Duration(milliseconds: 100),
                    top: -10 - _y,
                    bottom: -10 + _y,
                    left: -10 + _x,
                    right: -10 - _x,
                    child: Opacity(
                      opacity: 0.5,
                      child: Image.network(
                        'https://images.unsplash.com/photo-1617788138017-80ad40651399?q=80&w=2070&auto=format&fit=crop', // Placeholder Car Image
                        fit: BoxFit.cover,
                        errorBuilder: (c, o, s) => const Icon(
                          Icons.speed,
                          size: 100,
                          color: Colors.grey,
                        ),
                      ),
                    ),
                  ),
                  const Center(
                    child: Icon(Icons.speed, size: 100, color: Colors.white24),
                  ),
                ],
              ),
            ),
          ),
          SliverList(
            delegate: SliverChildListDelegate([
              const Padding(
                padding: EdgeInsets.all(20.0),
                child: Text(
                  'EXPERIENCE\nPERFECTION',
                  style: TextStyle(
                    fontSize: 40,
                    fontWeight: FontWeight.w900,
                    height: 0.9,
                    color: Colors.white,
                  ),
                ),
              ),
              Container(
                height: 200,
                color: const Color(0xFF111111),
                margin: const EdgeInsets.symmetric(horizontal: 20),
                child: const Center(child: Text('Featured Car Placeholder')),
              ),
            ]),
          ),
        ],
      ),
    );
  }
}
