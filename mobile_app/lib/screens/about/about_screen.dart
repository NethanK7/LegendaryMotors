import 'package:flutter/material.dart';
import 'package:google_fonts/google_fonts.dart';

class AboutScreen extends StatelessWidget {
  const AboutScreen({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text(
          'LEGACY & VISION',
          style: GoogleFonts.inter(
            fontWeight: FontWeight.bold,
            letterSpacing: 1.5,
            fontSize: 16,
          ),
        ),
        centerTitle: true,
      ),
      body: SingleChildScrollView(
        padding: const EdgeInsets.all(24),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            Text(
              'THE BRABUS DNA',
              style: GoogleFonts.inter(
                fontSize: 24,
                fontWeight: FontWeight.w900,
                color: Colors.white,
                letterSpacing: -0.5,
              ),
            ),
            const SizedBox(height: 16),
            Text(
              'Since 1977, BRABUS has been synonymous with high-performance automobiles. We transform standard Mercedes-Benz vehicles into unique masterpieces of power and luxury. Our philosophy is simple: Don\'t just build cars, create legends.',
              style: GoogleFonts.inter(
                fontSize: 14,
                height: 1.6,
                color: Colors.grey[400],
              ),
            ),
            const SizedBox(height: 32),
            Container(
              height: 200,
              width: double.infinity,
              decoration: BoxDecoration(
                borderRadius: BorderRadius.circular(2),
                image: const DecorationImage(
                  image: NetworkImage(
                    'https://images.unsplash.com/photo-1552519507-da3b142c6e3d?q=80&w=2672&auto=format&fit=crop',
                  ),
                  fit: BoxFit.cover,
                ),
              ),
            ),
            const SizedBox(height: 32),
            Text(
              'PRECISION ENGINEERING',
              style: GoogleFonts.inter(
                fontSize: 20,
                fontWeight: FontWeight.w800,
                color: Colors.white,
                letterSpacing: -0.5,
              ),
            ),
            const SizedBox(height: 16),
            Text(
              'Every engine we tune, every interior we stitch, is a testament to German engineering excellence. We push the boundaries of physics to deliver driving experiences that are unmatched.',
              style: GoogleFonts.inter(
                fontSize: 14,
                height: 1.6,
                color: Colors.grey[400],
              ),
            ),
          ],
        ),
      ),
    );
  }
}
