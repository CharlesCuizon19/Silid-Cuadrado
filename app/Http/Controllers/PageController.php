<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function homepage()
    {
        $services = [
            (object) [
                'id' => 1,
                'thumbnail' => 'images/service-detail-img1.png',
                'title' => 'Steel & Metal Fabrication',
                'description' => 'Custom steel structures and components engineered for strength and durability.',
                'img' => 'images/service-img1.png',
                'overview' => 'Our Steel & Metal Fabrication services provide custom solutions for a wide range of industrial and commercial applications. We specialize in designing and fabricating steel structures and components that are engineered for strength, durability, and precision. Whether you need structural steel for buildings, custom metal parts, or specialized fabrication services, our team of experts is equipped to deliver high-quality results tailored to your specific needs.',
                'what_we_offer' => [
                    'Custom Steel Fabrication',
                    'Structural Steel Design',
                    'Metal Component Manufacturing',
                    'Welding and Assembly Services',
                    'On-site Installation and Support',
                ],
                'gallery' => [
                    'images/service-gallery1.png',
                    'images/service-gallery2.png',
                    'images/service-gallery2.png',
                ],
                'date' => '2023-10-01',
            ],
            (object) [
                'id' => 2,
                'thumbnail' => 'images/service-detail-img1.png',
                'title' => 'Refrigeration & Airconditioning',
                'description' => 'Installation and maintenance of airconditioning and HVAC systems.',
                'img' => 'images/service-img2.png',
                'overview' => 'Our Refrigeration & Airconditioning services offer comprehensive solutions for both residential and commercial clients. We specialize in the installation, maintenance, and repair of airconditioning and HVAC systems to ensure optimal performance and energy efficiency. Our team of skilled technicians is dedicated to providing reliable climate control solutions that meet your specific requirements, whether it\'s for a small office or a large industrial facility.',
                'what_we_offer' => [
                    'HVAC System Installation',
                    'Air Conditioning Repair',
                    'Refrigeration Solutions',
                    'Preventive Maintenance Plans',
                    'Energy Efficiency Upgrades',
                ],
                'gallery' => [
                    'images/service-gallery1.png',
                    'images/service-gallery2.png',
                    'images/service-gallery2.png',
                ],
                'date' => '2023-10-02',
            ],
            (object) [
                'id' => 3,
                'thumbnail' => 'images/service-detail-img1.png',
                'title' => 'Electrical Works',
                'description' => 'Installation of electrical systems designed for safe and reliable power distribution.',
                'img' => 'images/service-img3.png',
                'overview' => 'Our Electrical Works services encompass a wide range of solutions for residential, commercial, and industrial clients. We specialize in the installation, maintenance, and repair of electrical systems designed for safe and reliable power distribution. Our team of licensed electricians is committed to delivering high-quality workmanship and ensuring that all electrical installations comply with industry standards and regulations. From wiring and lighting to complex electrical systems, we provide tailored solutions to meet your specific needs.',
                'what_we_offer' => [
                    'HVAC System Installation',
                    'Air Conditioning Repair',
                    'Refrigeration Solutions',
                    'Preventive Maintenance Plans',
                    'Energy Efficiency Upgrades',
                ],
                'gallery' => [
                    'images/service-gallery1.png',
                    'images/service-gallery2.png',
                    'images/service-gallery2.png',
                ],
                'date' => '2023-10-03',
            ],
            (object) [
                'id' => 4,
                'thumbnail' => 'images/service-detail-img1.png',
                'title' => 'Project Management',
                'description' => 'Professional oversight ensuring projects are delivered on time and on budget.',
                'img' => 'images/service-img4.png',
                'overview' => 'Our Project Management services provide professional oversight and coordination to ensure that your projects are delivered on time, within budget, and to the highest quality standards. We specialize in managing a wide range of projects across various industries, including construction, engineering, and manufacturing. Our experienced project managers work closely with clients, contractors, and stakeholders to plan, execute, and monitor every aspect of the project lifecycle. From initial concept development to final delivery, we are committed to achieving successful outcomes that meet your specific goals and requirements.',
                'what_we_offer' => [
                    'HVAC System Installation',
                    'Air Conditioning Repair',
                    'Refrigeration Solutions',
                    'Preventive Maintenance Plans',
                    'Energy Efficiency Upgrades',
                ],
                'gallery' => [
                    'images/service-gallery1.png',
                    'images/service-gallery2.png',
                    'images/service-gallery2.png',
                ],
                'date' => '2023-10-04',
            ],
            (object) [
                'id' => 5,
                'thumbnail' => 'images/service-detail-img1.png',
                'title' => 'Design & Consultancy',
                'description' => 'Expert design and engineering consultation for industrial and commercial setups.',
                'img' => 'images/service-img5.png',
                'overview' => 'Our Design & Consultancy services offer expert guidance and innovative solutions for industrial and commercial setups. We specialize in providing comprehensive design and engineering consultation to help clients optimize their operations, improve efficiency, and achieve their business objectives. Our team of experienced consultants works closely with clients to understand their unique challenges and develop tailored strategies that address their specific needs. From initial concept design to detailed engineering plans, we are committed to delivering high-quality solutions that drive success and growth.',
                'what_we_offer' => [
                    'HVAC System Installation',
                    'Air Conditioning Repair',
                    'Refrigeration Solutions',
                    'Preventive Maintenance Plans',
                    'Energy Efficiency Upgrades',
                ],
                'gallery' => [
                    'images/service-gallery1.png',
                    'images/service-gallery2.png',
                    'images/service-gallery2.png',
                ],
                'date' => '2023-10-05',
            ],
            (object) [
                'id' => 6,
                'thumbnail' => 'images/service-detail-img1.png',
                'title' => 'Maintenance Services',
                'description' => 'Reliable maintenance support to extend the life of your installations.',
                'img' => 'images/service-img6.png',
                'overview' => 'Our Maintenance Services provide reliable support to help extend the life and performance of your installations. We specialize in offering comprehensive maintenance solutions for a wide range of equipment and systems, including HVAC, electrical, mechanical, and industrial machinery. Our team of skilled technicians is dedicated to ensuring that your assets remain in optimal condition through regular inspections, preventive maintenance, and prompt repairs. Whether you need routine servicing or emergency support, we are committed to delivering high-quality maintenance services that minimize downtime and maximize efficiency.',
                'what_we_offer' => [
                    'HVAC System Installation',
                    'Air Conditioning Repair',
                    'Refrigeration Solutions',
                    'Preventive Maintenance Plans',
                    'Energy Efficiency Upgrades',
                ],
                'gallery' => [
                    'images/service-gallery1.png',
                    'images/service-gallery2.png',
                    'images/service-gallery2.png',
                ],
                'date' => '2023-10-06',
            ],
            (object) [
                'id' => 7,
                'thumbnail' => 'images/service-detail-img1.png',
                'title' => 'Automation Systems',
                'description' => 'Modern automation systems for efficiency and precision in operations.',
                'img' => 'images/service-img7.png',
                'overview' => 'Our Automation Systems services provide modern solutions designed to enhance efficiency and precision in operations. We specialize in the design, installation, and integration of advanced automation technologies for various industries, including manufacturing, processing, and logistics. Our team of experts works closely with clients to develop customized automation systems that streamline workflows, reduce operational costs, and improve overall productivity. From robotic systems to control software, we are committed to delivering innovative automation solutions that meet your specific business needs.',
                'what_we_offer' => [
                    'HVAC System Installation',
                    'Air Conditioning Repair',
                    'Refrigeration Solutions',
                    'Preventive Maintenance Plans',
                    'Energy Efficiency Upgrades',
                ],
                'gallery' => [
                    'images/service-gallery1.png',
                    'images/service-gallery2.png',
                    'images/service-gallery2.png',
                ],
                'date' => '2023-10-07',
            ],
            (object) [
                'id' => 8,
                'thumbnail' => 'images/service-detail-img1.png',
                'title' => 'Fire Protection Systems',
                'description' => 'Installation of fire safety systems compliant with global standards.',
                'img' => 'images/service-img8.png',
                'overview' => 'Our Fire Protection Systems services offer comprehensive solutions for the installation and maintenance of fire safety systems that comply with global standards. We specialize in designing and implementing fire protection measures for residential, commercial, and industrial properties to ensure the safety of occupants and assets. Our team of certified professionals is dedicated to providing high-quality fire detection, suppression, and alarm systems tailored to your specific needs. From initial risk assessment to system installation and ongoing maintenance, we are committed to delivering reliable fire protection solutions that meet regulatory requirements and enhance overall safety.',
                'what_we_offer' => [
                    'HVAC System Installation',
                    'Air Conditioning Repair',
                    'Refrigeration Solutions',
                    'Preventive Maintenance Plans',
                    'Energy Efficiency Upgrades',
                ],
                'gallery' => [
                    'images/service-gallery1.png',
                    'images/service-gallery2.png',
                    'images/service-gallery2.png',
                ],
                'date' => '2023-10-08',
            ],
            (object) [
                'id' => 9,
                'thumbnail' => 'images/service-detail-img1.png',
                'title' => 'Plumbing Works',
                'description' => 'Comprehensive plumbing solutions for residential, commercial, and industrial projects.',
                'img' => 'images/service-img9.png',
                'overview' => 'Our Plumbing Works services provide comprehensive solutions for residential, commercial, and industrial projects. We specialize in the installation, repair, and maintenance of plumbing systems designed to ensure efficient water supply and waste management. Our team of licensed plumbers is committed to delivering high-quality workmanship and reliable service for a wide range of plumbing needs, including pipe installations, fixture repairs, drainage solutions, and more. Whether you are undertaking a new construction project or need assistance with existing plumbing systems, we are dedicated to providing tailored solutions that meet your specific requirements.',
                'what_we_offer' => [
                    'HVAC System Installation',
                    'Air Conditioning Repair',
                    'Refrigeration Solutions',
                    'Preventive Maintenance Plans',
                    'Energy Efficiency Upgrades',
                ],
                'gallery' => [
                    'images/service-gallery1.png',
                    'images/service-gallery2.png',
                    'images/service-gallery2.png',
                ],
                'date' => '2023-10-09',
            ],
            (object) [
                'id' => 10,
                'thumbnail' => 'images/service-detail-img1.png',
                'title' => 'Solar Energy Systems',
                'description' => 'Renewable solar energy installations for sustainable power solutions.',
                'img' => 'images/service-img1.png',
                'overview' => 'Our Solar Energy Systems services offer renewable energy solutions through the installation of solar power systems for residential, commercial, and industrial applications. We specialize in designing and implementing solar energy systems that harness the power of the sun to provide sustainable and cost-effective electricity. Our team of experts works closely with clients to develop customized solar solutions that meet their specific energy needs and environmental goals. From initial site assessment to system installation and maintenance, we are committed to delivering high-quality solar energy solutions that promote sustainability and reduce reliance on traditional energy sources.',
                'what_we_offer' => [
                    'HVAC System Installation',
                    'Air Conditioning Repair',
                    'Refrigeration Solutions',
                    'Preventive Maintenance Plans',
                    'Energy Efficiency Upgrades',
                ],
                'gallery' => [
                    'images/service-gallery1.png',
                    'images/service-gallery2.png',
                    'images/service-gallery2.png',
                ],
                'date' => '2023-10-10',
            ],
        ];

        return view('pages.homepage', compact('services'));
    }
    public function about_us()
    {
        return view('pages.about-us');
    }
    public function products()
    {
        $allProducts = collect([
            (object) ['id' => 1, 'name' => 'Panel Boards', 'img' => 'images/product1.png'],
            (object) ['id' => 2, 'name' => 'Cable Trays', 'img' => 'images/product2.png'],
            (object) ['id' => 3, 'name' => 'Pull Boxes', 'img' => 'images/product3.png'],
            (object) ['id' => 4, 'name' => 'Switch Gears', 'img' => 'images/product3.png'],
            (object) ['id' => 5, 'name' => 'Breaker Panels', 'img' => 'images/product3.png'],
            (object) ['id' => 6, 'name' => 'Lighting Fixtures', 'img' => 'images/product3.png'],
            (object) ['id' => 7, 'name' => 'Control Panels', 'img' => 'images/product3.png'],
            (object) ['id' => 8, 'name' => 'Enclosures', 'img' => 'images/product3.png'],
            (object) ['id' => 9, 'name' => 'Power Cabinets', 'img' => 'images/product3.png'],
            (object) ['id' => 10, 'name' => 'Panel Boards 2', 'img' => 'images/product3.png'],
            (object) ['id' => 11, 'name' => 'Cable Trays 2', 'img' => 'images/product3.png'],
            (object) ['id' => 12, 'name' => 'Pull Boxes 2', 'img' => 'images/product3.png'],
            (object) ['id' => 13, 'name' => 'Switch Gears 2', 'img' => 'images/product3.png'],
            (object) ['id' => 14, 'name' => 'Breaker Panels 2', 'img' => 'images/product3.png'],
            (object) ['id' => 15, 'name' => 'Lighting Fixtures 2', 'img' => 'images/product3.png'],
            (object) ['id' => 16, 'name' => 'Control Panels 2', 'img' => 'images/product3.png'],
            (object) ['id' => 17, 'name' => 'Enclosures 2', 'img' => 'images/product3.png'],
            (object) ['id' => 18, 'name' => 'Power Cabinets 2', 'img' => 'images/product3.png'],
            (object) ['id' => 19, 'name' => 'Panel Boards 3', 'img' => 'images/product3.png'],
            (object) ['id' => 20, 'name' => 'Cable Trays 3', 'img' => 'images/product3.png'],
            (object) ['id' => 21, 'name' => 'Pull Boxes 3', 'img' => 'images/product3.png'],
            (object) ['id' => 22, 'name' => 'Switch Gears 3', 'img' => 'images/product3.png'],
            (object) ['id' => 23, 'name' => 'Breaker Panels 3', 'img' => 'images/product3.png'],
            (object) ['id' => 24, 'name' => 'Lighting Fixtures 3', 'img' => 'images/product3.png'],
            (object) ['id' => 25, 'name' => 'Control Panels 3', 'img' => 'images/product3.png'],
        ]);

        // Simulate pagination manually (since we don't have DB yet)
        $page = request()->get('page', 1);
        $perPage = 9;
        $total = $allProducts->count();
        $products = $allProducts->forPage($page, $perPage);
        $lastPage = ceil($total / $perPage);

        return view('pages.products', compact('products', 'page', 'lastPage', 'perPage', 'total'));
    }
    public function product_details($id)
    {
        $products = [
            (object) [
                'id' => 1,
                'name' => 'Panel Boards',
                'thumbnail' => 'images/product1.png',
                'images' => [
                    'images/product1-1.png',
                    'images/product1-2.png',
                    'images/product1-3.png',
                    'images/product1-4.png',
                ],
                'description' => 'High-quality panel boards for various applications.',
                'overview' => 'Our Panel Boards are designed to provide reliable electrical distribution and protection for residential, commercial, and industrial applications. Crafted with precision and using high-quality materials, these panel boards ensure safety and efficiency in managing electrical circuits. Whether you need a standard panel board or a custom solution, our products are built to meet your specific requirements.',
                'category' => 'Electrical Works',
                'date' => '2023-10-01',
            ],
            (object) [
                'id' => 2,
                'name' => 'Cable Trays',
                'thumbnail' => 'images/product2.png',
                'images' => [
                    'images/product2.png',
                    'images/product1-2.png',
                    'images/product1-3.png',
                    'images/product1-4.png',
                ],
                'description' => 'Durable cable trays for efficient cable management.',
                'overview' => 'Our Cable Trays are designed to provide reliable support and management for electrical cables in various settings. Made from high-quality materials, these trays ensure safety and efficiency in cable organization. Whether you need standard trays or custom solutions, our products are built to meet your specific requirements.',

                'category' => 'Electrical Works',
                'date' => '2023-10-02',
            ],
            (object) [
                'id' => 3,
                'name' => 'Pull Boxes',
                'thumbnail' => 'images/product3.png',
                'images' => [
                    'images/product3.png',
                    'images/product1-2.png',
                    'images/product1-3.png',
                    'images/product1-4.png',
                ],
                'description' => 'Sturdy pull boxes for electrical junctions.',
                'overview' => 'Our Panel Boards are designed to provide reliable electrical distribution and protection for residential, commercial, and industrial applications. Crafted with precision and using high-quality materials, these panel boards ensure safety and efficiency in managing electrical circuits. Whether you need a standard panel board or a custom solution, our products are built to meet your specific requirements.',

                'category' => 'Electrical Works',
                'date' => '2023-10-03',
            ],
            (object) [
                'id' => 4,
                'name' => 'Switch Gears',
                'thumbnail' => 'images/product4.png',
                'images' => [
                    'images/product4.png',
                    'images/product1-2.png',
                    'images/product1-3.png',
                    'images/product1-4.png',
                ],
                'description' => 'Reliable switch gears for various applications.',
                'overview' => 'Our Panel Boards are designed to provide reliable electrical distribution and protection for residential, commercial, and industrial applications. Crafted with precision and using high-quality materials, these panel boards ensure safety and efficiency in managing electrical circuits. Whether you need a standard panel board or a custom solution, our products are built to meet your specific requirements.',

                'category' => 'Electrical Works',
                'date' => '2023-10-04',
            ],
            (object) [
                'id' => 1,
                'name' => 'Breaker Panels',
                'thumbnail' => 'images/product3.png',
                'images' => [
                    'images/product3-1.png',
                    'images/product3-2.png',
                    'images/product3-3.png',
                    'images/product3-4.png',
                ],
                'description' => 'High-performance breaker panels for electrical systems.',
                'overview' => 'Our Panel Boards are designed to provide reliable electrical distribution and protection for residential, commercial, and industrial applications. Crafted with precision and using high-quality materials, these panel boards ensure safety and efficiency in managing electrical circuits. Whether you need a standard panel board or a custom solution, our products are built to meet your specific requirements.',

                'category' => 'Electrical Works',
                'date' => '2023-10-05',
            ],
            (object) [
                'id' => 5,
                'name' => 'Lighting Fixtures',
                'thumbnail' => 'images/product5.png',
                'images' => [
                    'images/product5-1.png',
                    'images/product5-2.png',
                    'images/product5-3.png',
                    'images/product5-4.png',
                ],
                'description' => 'Energy-efficient lighting fixtures for various applications.',
                'overview' => 'Our Panel Boards are designed to provide reliable electrical distribution and protection for residential, commercial, and industrial applications. Crafted with precision and using high-quality materials, these panel boards ensure safety and efficiency in managing electrical circuits. Whether you need a standard panel board or a custom solution, our products are built to meet your specific requirements.',

                'category' => 'Electrical Works',
            ],
            (object) [
                'id' => 6,
                'name' => 'Control Panels',
                'thumbnail' => 'images/product6.png',
                'images' => [
                    'images/product6-1.png',
                    'images/product6-2.png',
                    'images/product6-3.png',
                    'images/product6-4.png',
                ],
                'description' => 'User-friendly control panels for efficient operation.',
                'overview' => 'Our Panel Boards are designed to provide reliable electrical distribution and protection for residential, commercial, and industrial applications. Crafted with precision and using high-quality materials, these panel boards ensure safety and efficiency in managing electrical circuits. Whether you need a standard panel board or a custom solution, our products are built to meet your specific requirements.',

                'category' => 'Electrical Works',
                'date' => '2023-10-06',
            ],
            (object) [
                'id' => 7,
                'name' => 'Enclosures',
                'thumbnail' => 'images/product7.png',
                'images' => [
                    'images/product7-1.png',
                    'images/product7-2.png',
                    'images/product7-3.png',
                    'images/product7-4.png',
                ],
                'description' => 'Durable enclosures for electrical components.',
                'overview' => 'Our Panel Boards are designed to provide reliable electrical distribution and protection for residential, commercial, and industrial applications. Crafted with precision and using high-quality materials, these panel boards ensure safety and efficiency in managing electrical circuits. Whether you need a standard panel board or a custom solution, our products are built to meet your specific requirements.',

                'category' => 'Electrical Works',
                'date' => '2023-10-07',
            ],
            (object) [
                'id' => 8,
                'name' => 'Power Cabinets',
                'thumbnail' => 'images/product8.png',
                'images' => [
                    'images/product8-1.png',
                    'images/product8-2.png',
                    'images/product8-3.png',
                    'images/product8-4.png',
                ],
                'description' => 'Spacious power cabinets for efficient equipment housing.',
                'overview' => 'Our Panel Boards are designed to provide reliable electrical distribution and protection for residential, commercial, and industrial applications. Crafted with precision and using high-quality materials, these panel boards ensure safety and efficiency in managing electrical circuits. Whether you need a standard panel board or a custom solution, our products are built to meet your specific requirements.',

                'category' => 'Electrical Works',
                'date' => '2023-10-08',
            ],
            (object) [
                'id' => 9,
                'name' => 'Panel Boards 2',
                'thumbnail' => 'images/product3.png',
                'images' => [
                    'images/product3-1.png',
                    'images/product3-2.png',
                    'images/product3-3.png',
                    'images/product3-4.png',
                ],
                'description' => 'High-quality panel boards for various applications.',
                'overview' => 'Our Panel Boards are designed to provide reliable electrical distribution and protection for residential, commercial, and industrial applications. Crafted with precision and using high-quality materials, these panel boards ensure safety and efficiency in managing electrical circuits. Whether you need a standard panel board or a custom solution, our products are built to meet your specific requirements.',

                'category' => 'Electrical Works',
                'date' => '2023-10-09',
            ],
            (object) [
                'id' => 10,
                'name' => 'Cable Trays 2',
                'thumbnail' => 'images/product3.png',
                'images' => [
                    'images/product3-1.png',
                    'images/product3-2.png',
                    'images/product3-3.png',
                    'images/product3-4.png',
                ],
                'description' => 'Durable cable trays for efficient cable management.',
                'overview' => 'Our Panel Boards are designed to provide reliable electrical distribution and protection for residential, commercial, and industrial applications. Crafted with precision and using high-quality materials, these panel boards ensure safety and efficiency in managing electrical circuits. Whether you need a standard panel board or a custom solution, our products are built to meet your specific requirements.',

                'category' => 'Electrical Works',
                'date' => '2023-10-10',
            ],
            (object) [
                'id' => 11,
                'name' => 'Pull Boxes 2',
                'thumbnail' => 'images/product3.png',
                'images' => [
                    'images/product3-1.png',
                    'images/product3-2.png',
                    'images/product3-3.png',
                    'images/product3-4.png',
                ],
                'description' => 'Sturdy pull boxes for electrical junctions.',
                'overview' => 'Our Panel Boards are designed to provide reliable electrical distribution and protection for residential, commercial, and industrial applications. Crafted with precision and using high-quality materials, these panel boards ensure safety and efficiency in managing electrical circuits. Whether you need a standard panel board or a custom solution, our products are built to meet your specific requirements.',
                'category' => 'Electrical Works',
                'date' => '2023-10-11',
            ],
        ];

        $product = collect($products)->firstWhere('id', $id);

        $products = collect($products)
            ->where('id', '!=', $id)
            ->sortByDesc('date')
            ->take(3);



        return view('pages.product-details', compact('product', 'products'));
    }
    public function services()
    {

        $services = [
            (object) [
                'id' => 1,
                'title' => 'Steel & Metal Fabrication',
                'description' => 'Custom steel structures and components engineered for strength and durability.',
                'img' => 'images/service-img1.png',
            ],
            (object) [
                'id' => 2,
                'title' => 'Refrigeration & Airconditioning',
                'description' => 'Installation and maintenance of airconditioning and HVAC systems.',
                'img' => 'images/service-img2.png',
            ],
            (object) [
                'id' => 3,
                'title' => 'Electrical Works',
                'description' => 'Installation of electrical systems designed for safe and reliable power distribution.',
                'img' => 'images/service-img3.png',
            ],
            (object) [
                'id' => 4,
                'title' => 'Project Management',
                'description' => 'Professional oversight ensuring projects are delivered on time and on budget.',
                'img' => 'images/service-img4.png',
            ],
            (object) [
                'id' => 5,
                'title' => 'Design & Consultancy',
                'description' => 'Expert design and engineering consultation for industrial and commercial setups.',
                'img' => 'images/service-img5.png',
            ],
            (object) [
                'id' => 6,
                'title' => 'Maintenance Services',
                'description' => 'Reliable maintenance support to extend the life of your installations.',
                'img' => 'images/service-img6.png',
            ],
            (object) [
                'id' => 7,
                'title' => 'Automation Systems',
                'description' => 'Modern automation systems for efficiency and precision in operations.',
                'img' => 'images/service-img7.png',
            ],
            (object) [
                'id' => 8,
                'title' => 'Fire Protection Systems',
                'description' => 'Installation of fire safety systems compliant with global standards.',
                'img' => 'images/service-img8.png',
            ],
            (object) [
                'id' => 9,
                'title' => 'Plumbing Works',
                'description' => 'Comprehensive plumbing solutions for residential, commercial, and industrial projects.',
                'img' => 'images/service-img9.png',
            ],
            (object) [
                'id' => 10,
                'title' => 'Solar Energy Systems',
                'description' => 'Renewable solar energy installations for sustainable power solutions.',
                'img' => 'images/service-img1.png',
            ],
        ];

        // Pagination setup
        $perPage = 9;
        $page = request()->get('page', 1);
        $total = count($services);
        $pages = ceil($total / $perPage);
        $offset = ($page - 1) * $perPage;
        $paginatedServices = array_slice($services, $offset, $perPage);

        return view('pages.services', compact('paginatedServices', 'page', 'pages', 'perPage', 'total'));
    }
    public function service_details($id)
    {
        $services = [
            (object) [
                'id' => 1,
                'thumbnail' => 'images/service-detail-img1.png',
                'title' => 'Steel & Metal Fabrication',
                'description' => 'Custom steel structures and components engineered for strength and durability.',
                'img' => 'images/service-img1.png',
                'overview' => 'Our Steel & Metal Fabrication services provide custom solutions for a wide range of industrial and commercial applications. We specialize in designing and fabricating steel structures and components that are engineered for strength, durability, and precision. Whether you need structural steel for buildings, custom metal parts, or specialized fabrication services, our team of experts is equipped to deliver high-quality results tailored to your specific needs.',
                'what_we_offer' => [
                    'Custom Steel Fabrication',
                    'Structural Steel Design',
                    'Metal Component Manufacturing',
                    'Welding and Assembly Services',
                    'On-site Installation and Support',
                ],
                'gallery' => [
                    'images/service-gallery1.png',
                    'images/service-gallery2.png',
                    'images/service-gallery2.png',
                ]
            ],
            (object) [
                'id' => 2,
                'thumbnail' => 'images/service-detail-img1.png',
                'title' => 'Refrigeration & Airconditioning',
                'description' => 'Installation and maintenance of airconditioning and HVAC systems.',
                'img' => 'images/service-img2.png',
                'overview' => 'Our Refrigeration & Airconditioning services offer comprehensive solutions for both residential and commercial clients. We specialize in the installation, maintenance, and repair of airconditioning and HVAC systems to ensure optimal performance and energy efficiency. Our team of skilled technicians is dedicated to providing reliable climate control solutions that meet your specific requirements, whether it\'s for a small office or a large industrial facility.',
                'what_we_offer' => [
                    'HVAC System Installation',
                    'Air Conditioning Repair',
                    'Refrigeration Solutions',
                    'Preventive Maintenance Plans',
                    'Energy Efficiency Upgrades',
                ],
                'gallery' => [
                    'images/service-gallery1.png',
                    'images/service-gallery2.png',
                    'images/service-gallery2.png',
                ],
            ],
            (object) [
                'id' => 3,
                'thumbnail' => 'images/service-detail-img1.png',
                'title' => 'Electrical Works',
                'description' => 'Installation of electrical systems designed for safe and reliable power distribution.',
                'img' => 'images/service-img3.png',
                'overview' => 'Our Electrical Works services encompass a wide range of solutions for residential, commercial, and industrial clients. We specialize in the installation, maintenance, and repair of electrical systems designed for safe and reliable power distribution. Our team of licensed electricians is committed to delivering high-quality workmanship and ensuring that all electrical installations comply with industry standards and regulations. From wiring and lighting to complex electrical systems, we provide tailored solutions to meet your specific needs.',
                'what_we_offer' => [
                    'HVAC System Installation',
                    'Air Conditioning Repair',
                    'Refrigeration Solutions',
                    'Preventive Maintenance Plans',
                    'Energy Efficiency Upgrades',
                ],
                'gallery' => [
                    'images/service-gallery1.png',
                    'images/service-gallery2.png',
                    'images/service-gallery2.png',
                ],
            ],
            (object) [
                'id' => 4,
                'thumbnail' => 'images/service-detail-img1.png',
                'title' => 'Project Management',
                'description' => 'Professional oversight ensuring projects are delivered on time and on budget.',
                'img' => 'images/service-img4.png',
                'overview' => 'Our Project Management services provide professional oversight and coordination to ensure that your projects are delivered on time, within budget, and to the highest quality standards. We specialize in managing a wide range of projects across various industries, including construction, engineering, and manufacturing. Our experienced project managers work closely with clients, contractors, and stakeholders to plan, execute, and monitor every aspect of the project lifecycle. From initial concept development to final delivery, we are committed to achieving successful outcomes that meet your specific goals and requirements.',
                'what_we_offer' => [
                    'HVAC System Installation',
                    'Air Conditioning Repair',
                    'Refrigeration Solutions',
                    'Preventive Maintenance Plans',
                    'Energy Efficiency Upgrades',
                ],
                'gallery' => [
                    'images/service-gallery1.png',
                    'images/service-gallery2.png',
                    'images/service-gallery2.png',
                ],
            ],
            (object) [
                'id' => 5,
                'thumbnail' => 'images/service-detail-img1.png',
                'title' => 'Design & Consultancy',
                'description' => 'Expert design and engineering consultation for industrial and commercial setups.',
                'img' => 'images/service-img5.png',
                'overview' => 'Our Design & Consultancy services offer expert guidance and innovative solutions for industrial and commercial setups. We specialize in providing comprehensive design and engineering consultation to help clients optimize their operations, improve efficiency, and achieve their business objectives. Our team of experienced consultants works closely with clients to understand their unique challenges and develop tailored strategies that address their specific needs. From initial concept design to detailed engineering plans, we are committed to delivering high-quality solutions that drive success and growth.',
                'what_we_offer' => [
                    'HVAC System Installation',
                    'Air Conditioning Repair',
                    'Refrigeration Solutions',
                    'Preventive Maintenance Plans',
                    'Energy Efficiency Upgrades',
                ],
                'gallery' => [
                    'images/service-gallery1.png',
                    'images/service-gallery2.png',
                    'images/service-gallery2.png',
                ],
            ],
            (object) [
                'id' => 6,
                'thumbnail' => 'images/service-detail-img1.png',
                'title' => 'Maintenance Services',
                'description' => 'Reliable maintenance support to extend the life of your installations.',
                'img' => 'images/service-img6.png',
                'overview' => 'Our Maintenance Services provide reliable support to help extend the life and performance of your installations. We specialize in offering comprehensive maintenance solutions for a wide range of equipment and systems, including HVAC, electrical, mechanical, and industrial machinery. Our team of skilled technicians is dedicated to ensuring that your assets remain in optimal condition through regular inspections, preventive maintenance, and prompt repairs. Whether you need routine servicing or emergency support, we are committed to delivering high-quality maintenance services that minimize downtime and maximize efficiency.',
                'what_we_offer' => [
                    'HVAC System Installation',
                    'Air Conditioning Repair',
                    'Refrigeration Solutions',
                    'Preventive Maintenance Plans',
                    'Energy Efficiency Upgrades',
                ],
                'gallery' => [
                    'images/service-gallery1.png',
                    'images/service-gallery2.png',
                    'images/service-gallery2.png',
                ],
            ],
            (object) [
                'id' => 7,
                'thumbnail' => 'images/service-detail-img1.png',
                'title' => 'Automation Systems',
                'description' => 'Modern automation systems for efficiency and precision in operations.',
                'img' => 'images/service-img7.png',
                'overview' => 'Our Automation Systems services provide modern solutions designed to enhance efficiency and precision in operations. We specialize in the design, installation, and integration of advanced automation technologies for various industries, including manufacturing, processing, and logistics. Our team of experts works closely with clients to develop customized automation systems that streamline workflows, reduce operational costs, and improve overall productivity. From robotic systems to control software, we are committed to delivering innovative automation solutions that meet your specific business needs.',
                'what_we_offer' => [
                    'HVAC System Installation',
                    'Air Conditioning Repair',
                    'Refrigeration Solutions',
                    'Preventive Maintenance Plans',
                    'Energy Efficiency Upgrades',
                ],
                'gallery' => [
                    'images/service-gallery1.png',
                    'images/service-gallery2.png',
                    'images/service-gallery2.png',
                ],
            ],
            (object) [
                'id' => 8,
                'thumbnail' => 'images/service-detail-img1.png',
                'title' => 'Fire Protection Systems',
                'description' => 'Installation of fire safety systems compliant with global standards.',
                'img' => 'images/service-img8.png',
                'overview' => 'Our Fire Protection Systems services offer comprehensive solutions for the installation and maintenance of fire safety systems that comply with global standards. We specialize in designing and implementing fire protection measures for residential, commercial, and industrial properties to ensure the safety of occupants and assets. Our team of certified professionals is dedicated to providing high-quality fire detection, suppression, and alarm systems tailored to your specific needs. From initial risk assessment to system installation and ongoing maintenance, we are committed to delivering reliable fire protection solutions that meet regulatory requirements and enhance overall safety.',
                'what_we_offer' => [
                    'HVAC System Installation',
                    'Air Conditioning Repair',
                    'Refrigeration Solutions',
                    'Preventive Maintenance Plans',
                    'Energy Efficiency Upgrades',
                ],
                'gallery' => [
                    'images/service-gallery1.png',
                    'images/service-gallery2.png',
                    'images/service-gallery2.png',
                ],
            ],
            (object) [
                'id' => 9,
                'thumbnail' => 'images/service-detail-img1.png',
                'title' => 'Plumbing Works',
                'description' => 'Comprehensive plumbing solutions for residential, commercial, and industrial projects.',
                'img' => 'images/service-img9.png',
                'overview' => 'Our Plumbing Works services provide comprehensive solutions for residential, commercial, and industrial projects. We specialize in the installation, repair, and maintenance of plumbing systems designed to ensure efficient water supply and waste management. Our team of licensed plumbers is committed to delivering high-quality workmanship and reliable service for a wide range of plumbing needs, including pipe installations, fixture repairs, drainage solutions, and more. Whether you are undertaking a new construction project or need assistance with existing plumbing systems, we are dedicated to providing tailored solutions that meet your specific requirements.',
                'what_we_offer' => [
                    'HVAC System Installation',
                    'Air Conditioning Repair',
                    'Refrigeration Solutions',
                    'Preventive Maintenance Plans',
                    'Energy Efficiency Upgrades',
                ],
                'gallery' => [
                    'images/service-gallery1.png',
                    'images/service-gallery2.png',
                    'images/service-gallery2.png',
                ],
            ],
            (object) [
                'id' => 10,
                'thumbnail' => 'images/service-detail-img1.png',
                'title' => 'Solar Energy Systems',
                'description' => 'Renewable solar energy installations for sustainable power solutions.',
                'img' => 'images/service-img1.png',
                'overview' => 'Our Solar Energy Systems services offer renewable energy solutions through the installation of solar power systems for residential, commercial, and industrial applications. We specialize in designing and implementing solar energy systems that harness the power of the sun to provide sustainable and cost-effective electricity. Our team of experts works closely with clients to develop customized solar solutions that meet their specific energy needs and environmental goals. From initial site assessment to system installation and maintenance, we are committed to delivering high-quality solar energy solutions that promote sustainability and reduce reliance on traditional energy sources.',
                'what_we_offer' => [
                    'HVAC System Installation',
                    'Air Conditioning Repair',
                    'Refrigeration Solutions',
                    'Preventive Maintenance Plans',
                    'Energy Efficiency Upgrades',
                ],
                'gallery' => [
                    'images/service-gallery1.png',
                    'images/service-gallery2.png',
                    'images/service-gallery2.png',
                ],
            ],
        ];

        $service = collect($services)->firstWhere('id', $id);

        $relatedServices = collect($services)
            ->where('id', '!=', $id)
            ->sortByDesc('date')
            ->take(4);

        if (!$service) {
            abort(404);
        }

        return view('pages.service-details', compact('service', 'relatedServices', 'services'));
    }
    public function projects()
    {
        // Sample project data
        $projects = collect([
            (object) [
                'id' => 1,
                'category' => 'STEEL & METAL FABRICATION',
                'name' => 'Stainless Steel Enclosure Fabrication',
                'img' => 'images/project1.png',
            ],
            (object) [
                'id' => 2,
                'category' => 'STEEL & METAL FABRICATION',
                'name' => 'Structural Steel Beams & Columns',
                'img' => 'images/project2.png',
            ],
            (object) [
                'id' => 3,
                'category' => 'STEEL & METAL FABRICATION',
                'name' => 'Steel Gates & Fencing Systems',
                'img' => 'images/project3.png',
            ],
            (object) [
                'id' => 4,
                'category' => 'STEEL & METAL FABRICATION',
                'name' => 'Custom Metal Canopy & Frame Works',
                'img' => 'images/project4.png',
            ],
            (object) [
                'id' => 5,
                'category' => 'STEEL & METAL FABRICATION',
                'name' => 'Steel Trusses & Roofing Systems',
                'img' => 'images/project5.png',
            ],
            (object) [
                'id' => 6,
                'category' => 'STEEL & METAL FABRICATION',
                'name' => 'Metal Railings & Handrails',
                'img' => 'images/project6.png',
            ],
            (object) [
                'id' => 7,
                'category' => 'STEEL & METAL FABRICATION',
                'name' => 'Aluminum Works & Frame Fabrication',
                'img' => 'images/project7.png',
            ],
            (object) [
                'id' => 8,
                'category' => 'STEEL & METAL FABRICATION',
                'name' => 'Heavy-duty Brackets & Support Structures',
                'img' => 'images/project8.png',
            ],
            (object) [
                'id' => 9,
                'category' => 'STEEL & METAL FABRICATION',
                'name' => 'Wrought Iron Designs',
                'img' => 'images/project9.png',
            ],
            (object) [
                'id' => 10,
                'category' => 'STEEL & METAL FABRICATION',
                'name' => 'Custom Racks & Frames',
                'img' => 'images/project10.png',
            ],
        ]);

        // Pagination setup
        $page = request()->get('page', 1);
        $perPage = 4;
        $total = $projects->count();
        $paginatedProjects = $projects->forPage($page, $perPage);
        $lastPage = ceil($total / $perPage);

        // Return the paginated subset to the view
        return view('pages.projects', [
            'projects' => $paginatedProjects,
            'page' => $page,
            'perPage' => $perPage,
            'total' => $total,
            'lastPage' => $lastPage,
        ]);
    }
    public function project_details($id)
    {
        // Sample project data
        $projects = [
            (object) [
                'id' => 1,
                'category' => 'STEEL & METAL FABRICATION',
                'name' => 'Stainless Steel Enclosure Fabrication',

                'overview' => 'Our Stainless Steel Enclosure Fabrication project involved the design and construction of custom enclosures tailored to meet specific industrial requirements. These enclosures were fabricated using high-quality stainless steel materials, ensuring durability, corrosion resistance, and optimal protection for sensitive equipment. The project encompassed various stages, including initial design consultation, precise fabrication processes, and final installation at the client\'s site. Our team worked closely with the client to ensure that the enclosures met all technical specifications and industry standards, resulting in a successful project delivery that enhanced the safety and functionality of their operations.',
                'img' => 'images/project1.png',
                'gallery' => [
                    'images/service-gallery1.png',
                    'images/service-gallery1.png',
                    'images/service-gallery1.png',
                    'images/service-gallery1.png',
                ],
                'scope_of_work' => [
                    'Custom Design Consultation',
                    'Precision Fabrication',
                    'Quality Material Selection',
                    'Protective Coating Application',
                    'On-site Installation and Testing',
                ],
                'date' => '2023-10-01',
            ],
            (object) [
                'id' => 2,
                'category' => 'STEEL & METAL FABRICATION',
                'name' => 'Structural Steel Beams & Columns',

                'overview' => 'This project involved the fabrication and installation of structural steel beams and columns for a commercial building. The steel components were custom-designed to meet specific load-bearing requirements and architectural specifications. Our team ensured precision in fabrication and adherence to safety standards throughout the installation process.',
                'img' => 'images/project2.png',
                'gallery' => [
                    'images/service-gallery1.png',
                    'images/service-gallery1.png',
                    'images/service-gallery1.png',
                    'images/service-gallery1.png',
                ],
                'scope_of_work' => [
                    'Structural Design and Engineering',
                    'Custom Fabrication of Beams and Columns',
                    'Welding and Assembly',
                    'Surface Treatment and Coating',
                    'On-site Installation and Inspection',
                ],
                'date' => '2023-10-02',
            ],
            (object) [
                'id' => 3,
                'category' => 'STEEL & METAL FABRICATION',
                'name' => 'Steel Gates & Fencing Systems',

                'overview' => 'This project involved the fabrication and installation of structural steel beams and columns for a commercial building. The steel components were custom-designed to meet specific load-bearing requirements and architectural specifications. Our team ensured precision in fabrication and adherence to safety standards throughout the installation process.',
                'img' => 'images/project3.png',
                'gallery' => [
                    'images/service-gallery1.png',
                    'images/service-gallery1.png',
                    'images/service-gallery1.png',
                    'images/service-gallery1.png',
                ],
                'scope_of_work' => [
                    'Structural Design and Engineering',
                    'Custom Fabrication of Beams and Columns',
                    'Welding and Assembly',
                    'Surface Treatment and Coating',
                    'On-site Installation and Inspection',
                ],
                'date' => '2023-10-03',
            ],
            (object) [
                'id' => 4,
                'category' => 'STEEL & METAL FABRICATION',
                'name' => 'Custom Metal Canopy & Frame Works',

                'overview' => 'This project involved the fabrication and installation of structural steel beams and columns for a commercial building. The steel components were custom-designed to meet specific load-bearing requirements and architectural specifications. Our team ensured precision in fabrication and adherence to safety standards throughout the installation process.',
                'img' => 'images/project4.png',
                'gallery' => [
                    'images/service-gallery1.png',
                    'images/service-gallery1.png',
                    'images/service-gallery1.png',
                    'images/service-gallery1.png',
                ],
                'scope_of_work' => [
                    'Structural Design and Engineering',
                    'Custom Fabrication of Beams and Columns',
                    'Welding and Assembly',
                    'Surface Treatment and Coating',
                    'On-site Installation and Inspection',
                ],
                'date' => '2023-10-04',
            ],
            (object) [
                'id' => 5,
                'category' => 'STEEL & METAL FABRICATION',
                'name' => 'Steel Trusses & Roofing Systems',

                'overview' => 'This project involved the fabrication and installation of structural steel beams and columns for a commercial building. The steel components were custom-designed to meet specific load-bearing requirements and architectural specifications. Our team ensured precision in fabrication and adherence to safety standards throughout the installation process.',
                'img' => 'images/project4.png',
                'gallery' => [
                    'images/service-gallery1.png',
                    'images/service-gallery1.png',
                    'images/service-gallery1.png',
                    'images/service-gallery1.png',
                ],
                'scope_of_work' => [
                    'Structural Design and Engineering',
                    'Custom Fabrication of Beams and Columns',
                    'Welding and Assembly',
                    'Surface Treatment and Coating',
                    'On-site Installation and Inspection',
                ],
                'date' => '2023-10-05',
            ],
            (object) [
                'id' => 6,
                'category' => 'STEEL & METAL FABRICATION',
                'name' => 'Metal Railings & Handrails',

                'overview' => 'This project involved the fabrication and installation of structural steel beams and columns for a commercial building. The steel components were custom-designed to meet specific load-bearing requirements and architectural specifications. Our team ensured precision in fabrication and adherence to safety standards throughout the installation process.',
                'img' => 'images/project4.png',
                'gallery' => [
                    'images/service-gallery1.png',
                    'images/service-gallery1.png',
                    'images/service-gallery1.png',
                    'images/service-gallery1.png',
                ],
                'scope_of_work' => [
                    'Structural Design and Engineering',
                    'Custom Fabrication of Beams and Columns',
                    'Welding and Assembly',
                    'Surface Treatment and Coating',
                    'On-site Installation and Inspection',
                ],
                'date' => '2023-10-06',
            ],
            (object) [
                'id' => 7,
                'category' => 'STEEL & METAL FABRICATION',
                'name' => 'Aluminum Works & Frame Fabrication',

                'overview' => 'This project involved the fabrication and installation of structural steel beams and columns for a commercial building. The steel components were custom-designed to meet specific load-bearing requirements and architectural specifications. Our team ensured precision in fabrication and adherence to safety standards throughout the installation process.',
                'img' => 'images/project4.png',
                'gallery' => [
                    'images/service-gallery1.png',
                    'images/service-gallery1.png',
                    'images/service-gallery1.png',
                    'images/service-gallery1.png',
                ],
                'scope_of_work' => [
                    'Structural Design and Engineering',
                    'Custom Fabrication of Beams and Columns',
                    'Welding and Assembly',
                    'Surface Treatment and Coating',
                    'On-site Installation and Inspection',
                ],
                'date' => '2023-10-07',
            ],
            (object) [
                'id' => 8,
                'category' => 'STEEL & METAL FABRICATION',
                'name' => 'Heavy-duty Brackets & Support Structures',

                'overview' => 'This project involved the fabrication and installation of structural steel beams and columns for a commercial building. The steel components were custom-designed to meet specific load-bearing requirements and architectural specifications. Our team ensured precision in fabrication and adherence to safety standards throughout the installation process.',
                'img' => 'images/project4.png',
                'gallery' => [
                    'images/service-gallery1.png',
                    'images/service-gallery1.png',
                    'images/service-gallery1.png',
                    'images/service-gallery1.png',
                ],
                'scope_of_work' => [
                    'Structural Design and Engineering',
                    'Custom Fabrication of Beams and Columns',
                    'Welding and Assembly',
                    'Surface Treatment and Coating',
                    'On-site Installation and Inspection',
                ],
                'date' => '2023-10-08',
            ],
            (object) [
                'id' => 9,
                'category' => 'STEEL & METAL FABRICATION',
                'name' => 'Wrought Iron Designs',

                'overview' => 'This project involved the fabrication and installation of structural steel beams and columns for a commercial building. The steel components were custom-designed to meet specific load-bearing requirements and architectural specifications. Our team ensured precision in fabrication and adherence to safety standards throughout the installation process.',
                'img' => 'images/project4.png',
                'gallery' => [
                    'images/service-gallery1.png',
                    'images/service-gallery1.png',
                    'images/service-gallery1.png',
                    'images/service-gallery1.png',
                ],
                'scope_of_work' => [
                    'Structural Design and Engineering',
                    'Custom Fabrication of Beams and Columns',
                    'Welding and Assembly',
                    'Surface Treatment and Coating',
                    'On-site Installation and Inspection',
                ],
                'date' => '2023-10-09',
            ],
            (object) [
                'id' => 10,
                'category' => 'STEEL & METAL FABRICATION',
                'name' => 'Custom Racks & Frames',

                'overview' => 'This project involved the fabrication and installation of structural steel beams and columns for a commercial building. The steel components were custom-designed to meet specific load-bearing requirements and architectural specifications. Our team ensured precision in fabrication and adherence to safety standards throughout the installation process.',
                'img' => 'images/project4.png',
                'gallery' => [
                    'images/service-gallery1.png',
                    'images/service-gallery1.png',
                    'images/service-gallery1.png',
                    'images/service-gallery1.png',
                ],
                'scope_of_work' => [
                    'Structural Design and Engineering',
                    'Custom Fabrication of Beams and Columns',
                    'Welding and Assembly',
                    'Surface Treatment and Coating',
                    'On-site Installation and Inspection',
                ],
                'date' => '2023-10-10',
            ],
        ];

        $project = collect($projects)->firstWhere('id', $id);

        $relatedProjects = collect($projects)
            ->where('id', '!=', $id)
            ->sortByDesc('date')
            ->take(3);

        if (!$project) {
            abort(404);
        }

        // Return the paginated subset to the view
        return view('pages.project-details', compact('project', 'relatedProjects'));
    }
    public function contact_us()
    {
        return view('pages.contact-us');
    }
}
