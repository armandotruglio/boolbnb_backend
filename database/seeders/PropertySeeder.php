<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $properties = [
            [
                'user_id' => 1,
                'title' => 'Apartment in the historic center',
                'description' => 'Located in the vibrant heart of the city, this exquisite apartment seamlessly blends the charm of its historic setting with the comfort and elegance of modern living. Nestled within walking distance of key landmarks, trendy cafes, and boutique shops, it offers unparalleled convenience for urban dwellers.
                                  The interior is thoughtfully designed, featuring spacious rooms filled with natural light, high ceilings, and premium finishes. The living area provides a cozy yet sophisticated ambiance, perfect for both relaxation and entertaining. The kitchen is fully equipped with state-of-the-art appliances, ideal for culinary enthusiasts.
                                   The bedroom(s) offer a peaceful retreat, with ample storage and serene decor that ensures restful nights. The bathroom(s) are impeccably finished, combining functionality with a touch of luxury.
                                   This apartment is a rare find, ideal for those seeking a stylish and convenient urban lifestyle.',
                'address' => 'Via Roma, 34, Torino',
                'latitude' => 45.069598,
                'longitude' => 7.683801,
                'rooms' => 3,
                'beds' => 2,
                'bathrooms' => 1,
                'square_meters' => 75,
                'is_visible' => true,
                'thumb_url' => 'casa-storica.jpg',
            ],
            [
                'user_id' => 1,
                'title' => 'Modern loft with a terrace',
                'description' => 'This stunning loft is a true urban oasis, offering a perfect blend of contemporary design and outdoor luxury. Located in a sought-after area, the property boasts an open-concept layout with soaring ceilings, expansive windows, and an abundance of natural light that creates a bright and inviting atmosphere.
                                    The interior seamlessly integrates modern elegance with industrial charm, featuring polished concrete floors, exposed beams, and sleek finishes. The living area is spacious and versatile, flowing effortlessly into a gourmet kitchen equipped with high-end appliances, a stylish island, and ample storage.
                                    The crown jewel of this loft is the private terrace, an expansive space ideal for hosting gatherings, enjoying morning coffee, or simply relaxing while taking in the city skyline. This outdoor haven is designed for year-round enjoyment, with options for al fresco dining, gardening, or creating a cozy lounge area.
                                    The bedroom area offers comfort and privacy, with thoughtfully designed details that make it a serene retreat. The bathroom is equally impressive, with luxurious fixtures and a spa-like ambiance.
                                    Perfect for those who value modern living with a touch of outdoor bliss, this loft is a rare find in the heart of the city.',
                'address' => 'Via Po, 21, Torino',
                'latitude' => 45.068984,
                'longitude' => 7.689173,
                'rooms' => 2,
                'beds' => 1,
                'bathrooms' => 1,
                'square_meters' => 60,
                'is_visible' => true,
                'thumb_url' => 'loft-terrazza.jpg',
            ],
            [
                'user_id' => 1,
                'title' => 'Cozy beach house',
                'description' => 'Nestled along the tranquil coastline, this exquisite seaside home is a haven of relaxation and natural beauty. Set against the backdrop of panoramic ocean views and the soothing sound of waves, the property offers a unique blend of comfort, charm, and coastal elegance.
                                    The home features a bright and airy design, with large windows that frame breathtaking vistas and fill the interiors with natural light. The open-concept living area flows effortlessly, offering a seamless connection between indoor and outdoor spaces. The living room is inviting, with cozy seating and a serene color palette inspired by the sea.
                                    The kitchen is a chef’s dream, equipped with modern appliances, ample counter space, and a layout perfect for both casual meals and entertaining. The dining area opens onto a spacious patio, ideal for savoring meals while enjoying the sea breeze.
                                    The bedrooms provide peaceful retreats, each designed with relaxation in mind. Wake up to the sound of waves and ocean views from the master suite, which features a private balcony. The bathrooms are equally luxurious, with spa-like finishes and a calming ambiance.
                                    Outside, the property boasts direct access to the beach or a lush garden that blends harmoniously with its surroundings. Whether you’re soaking up the sun, enjoying water sports, or simply unwinding with a book, this home offers the ultimate seaside lifestyle.',
                'address' => 'Via Pietro Micca, 22, Torino',
                'latitude' => 45.070496,
                'longitude' => 7.678457,
                'rooms' => 3,
                'beds' => 2,
                'bathrooms' => 1,
                'square_meters' => 50,
                'is_visible' => true,
                'thumb_url' => 'casa-spiaggia.jpg',
            ],
            [
                'user_id' => 2,
                'title' => 'Elegant villa with a pool',
                'description' => 'This magnificent villa is a private sanctuary of luxury and elegance, complete with a stunning pool that epitomizes relaxation and style. Set in a serene and picturesque location, the property combines modern sophistication with timeless charm, offering the perfect retreat for those seeking comfort and exclusivity.
                                    The villa’s architecture is breathtaking, with grand spaces and a seamless blend of indoor and outdoor living. The interior features an open floor plan with high ceilings, expansive windows, and premium finishes that create a bright and inviting ambiance. The living area is both spacious and stylish, ideal for entertaining or quiet evenings by the fireplace.
                                    The kitchen is a gourmet masterpiece, fully equipped with state-of-the-art appliances, a sleek island, and plenty of storage, making it perfect for culinary adventures. Adjacent, the dining area opens to a sprawling terrace that overlooks the pool, providing a perfect setting for al fresco dining or sunset cocktails.
                                    The bedrooms are serene and generously proportioned, offering the ultimate in privacy and comfort. The master suite stands out with its luxurious ensuite bathroom and direct access to a private balcony or patio.',
                'address' => 'Via Corte d\'Appello, 10, Torino',
                'latitude' => 45.074020,
                'longitude' => 7.680396,
                'rooms' => 6,
                'beds' => 4,
                'bathrooms' => 3,
                'square_meters' => 220,
                'is_visible' => true,
                'thumb_url' => 'villa-piscina.jpg',
            ],
            [
                'user_id' => 2,
                'title' => 'Rustic farmhouse',
                'description' => 'Set amidst rolling hills and lush countryside, this charming rustic farmhouse exudes timeless beauty and warm character. Perfectly blending traditional charm with modern comforts, it offers an idyllic retreat for those seeking a peaceful and authentic lifestyle surrounded by nature.
                                    The exterior of the farmhouse boasts classic stone walls, a pitched roof with terracotta tiles, and wooden shutters that reflect its rich heritage. A welcoming porch or veranda invites you to relax and take in the serene views of the surrounding landscape.
                                    Inside, the home is a treasure trove of rustic elegance, with exposed wooden beams, original stonework, and warm, earthy tones creating a cozy and inviting atmosphere. The living area features a large fireplace, perfect for gathering on cool evenings, while the spacious dining area is ideal for sharing meals with family and friends.
                                    The kitchen combines traditional craftsmanship with modern functionality, featuring handcrafted cabinetry, a farmhouse sink, and a spacious layout perfect for preparing hearty meals.
                                    The bedrooms are warm and inviting, with comfortable furnishings and large windows that let in plenty of natural light. The master suite offers a private retreat with serene views of the countryside.
                                    Outside, the farmhouse is surrounded by sprawling gardens, olive trees, or vineyards, and often includes outdoor spaces like a shaded pergola or a courtyard for dining al fresco. There may also be room for a small vegetable garden, ideal for embracing a farm-to-table lifestyle.
                                    This rustic farmhouse is a true gem, offering a harmonious blend of history, charm, and comfort in a tranquil rural setting. Perfect for those who dream of escaping the hustle and bustle to enjoy the simple pleasures of life in the countryside.',
                'address' => 'Piazzale della Torre, 11, Padova',
                'latitude' => 45.340506,
                'longitude' => 11.902828,
                'rooms' => 5,
                'beds' => 3,
                'bathrooms' => 2,
                'square_meters' => 180,
                'is_visible' => true,
                'thumb_url' => 'casale-rustico.jpg',
            ],
            [
                'user_id' => 2,
                'title' => 'Compact studio apartment',
                'description' => 'This cozy and thoughtfully designed studio apartment is a perfect blend of functionality and modern style, ideal for urban living. Despite its compact size, every square inch has been meticulously planned to maximize space and comfort.
                                    The open-concept layout creates a seamless flow between the living, sleeping, and dining areas, with smartly integrated furniture that optimizes functionality. A comfortable sofa bed or Murphy bed serves as a dual-purpose feature, transforming the space effortlessly from a lounge to a restful retreat.
                                    The kitchenette is compact yet fully equipped, featuring sleek cabinetry, a built-in cooktop, and efficient storage solutions to ensure everything is within easy reach. The dining area, whether a small table or a breakfast bar, provides a cozy spot for meals or working from home.
                                    Large windows or clever lighting create a bright and inviting ambiance, while modern finishes and neutral tones give the apartment a clean and stylish aesthetic. A compact yet well-appointed bathroom adds to the convenience, offering contemporary fixtures and efficient use of space.
                                    Perfect for singles, students, or those seeking a low-maintenance lifestyle, this compact studio apartment proves that great design can make even the smallest spaces feel like home.',
                'address' => 'Via G. Verdi, 21A, Padova',
                'latitude' => 45.336411,
                'longitude' => 11.903404,
                'rooms' => 1,
                'beds' => 1,
                'bathrooms' => 1,
                'square_meters' => 35,
                'is_visible' => true,
                'thumb_url' => 'monolocale.jpg',
            ],
            [
                'user_id' => 1,
                'title' => 'Luxury penthouse with sea view',
                'description' => 'Nestled on the pristine coastline, this opulent penthouse offers breathtaking panoramic views of the azure sea. The expansive, open-concept living space is adorned with floor-to-ceiling windows, bathing the interiors in natural light and highlighting the sophisticated décor.
                                    Step out onto the spacious terrace, where you can enjoy a morning coffee while gazing at the endless horizon, or host glamorous sunset soirées with the serene ocean as your backdrop. The gourmet kitchen is equipped with top-of-the-line appliances, perfect for crafting culinary masterpieces.
                                    Retreat to the master suite, a sanctuary of tranquility, featuring a private balcony, a lavish en-suite bathroom with a soaking tub, and a walk-in closet. Each additional bedroom boasts its own unique charm, with large windows offering stunning sea views.
                                    The building itself offers exclusive amenities including a rooftop infinity pool, a state-of-the-art fitness center, and 24-hour concierge service, ensuring every need is met with the utmost care.
                                    This seaside penthouse is not just a residence, but a lifestyle of unparalleled luxury and comfort, where every detail is designed to enhance your coastal living experience.',
                'address' => 'Via Moncenisio, 7, Padova',
                'latitude' => 45.341568,
                'longitude' => 11.904222,
                'rooms' => 4,
                'beds' => 3,
                'bathrooms' => 3,
                'square_meters' => 150,
                'is_visible' => true,
                'thumb_url' => 'attico-mare.jpg',
            ],
            [
                'user_id' => 2,
                'title' => 'Urban apartment close to metro',
                'description' => 'Discover the ultimate in city living with this chic urban apartment, perfectly located just steps away from the metro station. This modern residence offers unmatched convenience and connectivity, making your daily commute a breeze.
                                    Step inside to find a spacious, light-filled living area with contemporary finishes and sleek design elements. The open-plan layout seamlessly integrates the living, dining, and kitchen areas, creating an inviting space for relaxation and entertaining.
                                    The gourmet kitchen features high-end stainless steel appliances, quartz countertops, and ample storage, catering to both casual meals and gourmet cooking. The bedroom provides a serene retreat with large windows that allow for plenty of natural light, and a spacious closet for all your storage needs.',
                'address' => 'Via Tiberio Solis, 108, San Severo',
                'latitude' => 41.686876,
                'longitude' => 15.383615,
                'rooms' => 2,
                'beds' => 1,
                'bathrooms' => 1,
                'square_meters' => 65,
                'is_visible' => true,
                'thumb_url' => 'appartamento-metro.jpg',
            ],
            [
                'user_id' => 1,
                'title' => 'Country cottage with garden',
                'description' => 'Escape to your own serene haven with this charming garden cottage, a picturesque retreat that combines rustic elegance with modern comfort. Nestled amidst lush greenery, this delightful home offers a perfect blend of tranquility and convenience.
                                    As you step through the front door, you’re welcomed by a cozy living room with a warm, inviting atmosphere. The space is adorned with hardwood floors, a stone fireplace, and large windows that fill the room with natural light and offer enchanting views of the garden.
                                    The country-style kitchen is both functional and charming, featuring custom cabinetry, high-end appliances, and a quaint breakfast nook where you can enjoy your morning coffee while basking in the garden\'s beauty. The adjacent dining area is perfect for hosting intimate gatherings with family and friends.
                                    The master bedroom is a peaceful retreat, complete with a spacious wardrobe and a private en-suite bathroom that boasts luxurious fixtures. Additional bedrooms are equally inviting, offering comfort and charm for family or guests.',
                'address' => 'Via Soccorso, 88, San Severo',
                'latitude' => 41.685144,
                'longitude' => 15.381868,
                'rooms' => 4,
                'beds' => 2,
                'bathrooms' => 2,
                'square_meters' => 100,
                'is_visible' => true,
                'thumb_url' => 'casa-campagna.jpg',
            ],
            [
                'user_id' => 2,
                'title' => 'Family house in the suburbs',
                'description' => 'Experience the perfect blend of comfort and convenience in this spacious family home, ideally located in a serene suburban neighborhood. This inviting residence offers ample space for a growing family, with a thoughtful layout designed to accommodate both relaxation and entertaining.
                                    As you enter, you’re greeted by a welcoming foyer that opens into a bright and airy living room. Large windows flood the space with natural light, highlighting the elegant hardwood floors and cozy fireplace that create a warm and inviting atmosphere.
                                    The heart of the home is the open-concept kitchen and dining area, featuring modern appliances, granite countertops, and plenty of cabinet space for all your culinary needs. The adjacent dining area is perfect for family meals and special gatherings, with easy access to the backyard for indoor-outdoor living.
                                    Upstairs, the master suite is a true retreat, complete with a spacious walk-in closet and a luxurious en-suite bathroom. Additional bedrooms are generously sized, each with large closets and plenty of natural light, offering comfortable accommodations for family members or guests.',
                'address' => 'Piazza del Colosseo, Roma',
                'latitude' => 41.891034,
                'longitude' => 12.492660,
                'rooms' => 5,
                'beds' => 4,
                'bathrooms' => 2,
                'square_meters' => 200,
                'is_visible' => true,
                'thumb_url' => 'casa-periferia.jpg',
            ],
        ];


        foreach ($properties as $property) {
            Property::create($property);
        }
    }
}