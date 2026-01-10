class Car {
  final int id;
  final String brand;
  final String model;
  final int year;
  final double price;
  final String category;
  final String status;
  final String imageUrl;
  final Map<String, dynamic> specs;

  Car({
    required this.id,
    required this.brand,
    required this.model,
    required this.year,
    required this.price,
    required this.category,
    required this.status,
    required this.imageUrl,
    required this.specs,
  });

  factory Car.fromJson(Map<String, dynamic> json) {
    return Car(
      id: json['id'],
      brand: json['brand'] ?? '',
      model: json['model'] ?? '',
      year: json['year'] ?? 0,
      price: double.tryParse(json['price'].toString()) ?? 0.0,
      category: json['category'] ?? '',
      status: json['status'] ?? 'available',
      imageUrl: json['image_url'] ?? '',
      specs: json['specs'] ?? {},
    );
  }

  Map<String, dynamic> toJson() {
    return {
      'id': id,
      'brand': brand,
      'model': model,
      'year': year,
      'price': price,
      'category': category,
      'status': status,
      'image_url': imageUrl,
      'specs': specs,
    };
  }
}
