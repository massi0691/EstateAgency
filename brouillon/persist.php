$property = new Property();
$property->setTitle('Mon Bien 1')
->setDescription('Decription de mon bien 1')
->setSurface(600)
->setRooms(9)
->setBedrooms(6)
->setFloor(2)
->setCity('Toudja')
->setCountry('Kabylie')
->setAddress('Bejaia, Algérie')
->setPostalCode('99322')
->setParking(4)
->setStatus(0)
->setType(1)
->setPrice(300000);
$em = $this->getDoctrine()->getManager();
$em->persist($property);
$em->flush();

$property1 = new Property();
$property1->setTitle('Mon Bien 2')
->setDescription('Decription de mon bien 2')
->setSurface(800)
->setRooms(12)
->setBedrooms(8)
->setFloor(4)
->setCity('Béjaia')
->setCountry('Kabylie')
->setAddress('Bejaia, Algérie')
->setPostalCode('99322')
->setParking(5)
->setStatus(1)
->setType(0)
->setPrice(2000000000);
$em = $this->getDoctrine()->getManager();
$em->persist($property1);
$em->flush();


$property2 = new Property();
$property2->setTitle('Mon Bien 3')
->setDescription('Decription de mon bien 3')
->setSurface(20)
->setRooms(1)
->setBedrooms(1)
->setFloor(1)
->setCity('Béjaia')
->setCountry('Kabylie')
->setAddress('Bejaia, Algérie')
->setPostalCode('99322')
->setParking(0)
->setStatus(1)
->setType(2)
->setPrice(10000000);
$em = $this->getDoctrine()->getManager();
$em->persist($property2);
$em->flush();