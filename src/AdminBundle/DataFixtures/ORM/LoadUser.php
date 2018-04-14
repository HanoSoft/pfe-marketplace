<?php

namespace AdminBundle\DataFixtures\ORM;

use CoreBundle\Entity\ProductSize;
use CoreBundle\Entity\Tag;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use CoreBundle\Entity\Brand;
use CoreBundle\Entity\BrandImage;
use CoreBundle\Entity\Image;
use CoreBundle\Entity\Product;
use CoreBundle\Entity\Category;

class LoadUser implements FixtureInterface,ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }
    public function load(ObjectManager $manager)
    {
        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->createUser();
        $user->setUsername('super');
        $user->setEmail('super@gmail.com');
        $user->setPlainPassword('super');
        $user->setEnabled(true);
        $user->setName('super');
        $user->setfamilyName('super');
        $user->addRole('ROLE_SUPER_ADMIN');
        $manager->persist($user);

        $tag=new Tag();
        $tag->setName('Vêtements');

        $logo=new BrandImage();
        $logo->setName('logo_34294.jpg');
        $brandImage=new BrandImage();
        $brandImage->setName('generic_v4.jpg');
        $manager->persist($logo);
        $manager->persist($brandImage);
        $brand=new Brand();
        $brand->setBrandName('Unkut Paris');
        $brand->setDescription('<p>Cr&eacute;e en 2004 par le rappeur Booba,&nbsp;<span style="color:#2ecc71"><strong>Unkut</strong></span>&nbsp;est la marque embl&eacute;matique du streetwear fran&ccedil;ais, proposant des mod&egrave;les cr&eacute;atifs et des coupes travaill&eacute;es.</p>');
        $brand->setLogo($logo);
        $brand->setUser($user);
        $brand->setBrandImage($brandImage);
        $brand->setTag($tag);
        $manager->persist($brand);

        $category = new Category();
        $category->setBrand($brand);
        $category->setName("T-shirts et polos");
        $manager->persist($category);

        $product=new Product();
        $product->setCategory($category);
        $product->setProductName('T-shirt - Vert et bleu');
        $product->setPrice(16.00);
        $product->setStatus('En Stock');
        $product->setProductDetails("<p><span style=\"color:#2980b9\"><strong><span style=\"font-size:18px\">T-shirt &agrave; manches courtes.</span></strong></span><br />
Col rond.<br />
Empi&egrave;cements contrastants aux &eacute;paules et aux manches.<br />
Logo &agrave; la poitrine.&nbsp;<br />
<strong>Coloris</strong>&nbsp;: vert, bleu et noir<br />
<strong>Mati&egrave;re</strong>&nbsp;: 100% coton<br />
<strong>Entretien</strong>&nbsp;: lavage &agrave; 30&deg;C</p>");
        $product->setQuantity(200);

        $size=new ProductSize();
        $size->setProduct($product);
        $size->setSize("XS");
        $manager->persist($size);

        $size1=new ProductSize();
        $size1->setProduct($product);
        $size1->setSize("S");
        $manager->persist($size1);

        $size=new ProductSize();
        $size->setProduct($product);
        $size->setSize("M");
        $manager->persist($size);

        $image=new Image();
        $image1=new Image();
        $image->setName("products_9176928_image1_original.jpg");
        $image->setLabel("pc");
        $image->setProduct($product);
        $manager->persist($image);
        $image1->setName("products_9176928_image2_original.jpg");
        $image1->setLabel("T shirt");
        $image1->setProduct($product);
        $manager->persist($image1);
        $manager->flush();
        $manager->persist($product);
        $manager->flush();

        $product=new Product();
        $product->setCategory($category);
        $product->setProductName('T-shirt - Noir et taupe');
        $product->setPrice(19.00);
        $product->setStatus('En Stock');
        $product->setProductDetails("<p><span style=\"color:#4e5f70\"><span style=\"font-size:16px\"><strong><span style=\"font-family:Arial,Helvetica,sans-serif\">T-shirt &agrave; manches longues.</span></strong></span></span><br />
Col rond.<br />
Empi&egrave;cements contrastants devant et au dos.<br />
Logo &agrave; la poitrine.&nbsp;<br />
<strong>Coloris</strong>&nbsp;: noir, taupe, gris et blanc<br />
<strong>Mati&egrave;re</strong>&nbsp;: 100% polyester<br />
<strong>Entretien</strong>&nbsp;: lavage &agrave; 30&deg;C</p>");
        $product->setQuantity(200);

        $size=new ProductSize();
        $size->setProduct($product);
        $size->setSize("XS");
        $manager->persist($size);

        $size1=new ProductSize();
        $size1->setProduct($product);
        $size1->setSize("S");
        $manager->persist($size1);

        $size=new ProductSize();
        $size->setProduct($product);
        $size->setSize("M");
        $manager->persist($size);

        $image=new Image();
        $image1=new Image();
        $image->setName("products_9176924_image1_original.jpg");
        $image->setLabel("pc");
        $image->setProduct($product);
        $manager->persist($image);
        $image1->setName("products_9176924_image2_original.jpg");
        $image1->setLabel("T shirt");
        $image1->setProduct($product);
        $manager->persist($image1);
        $manager->flush();
        $manager->persist($product);
        $manager->flush();

       /*------------*/

        $category = new Category();
        $category->setBrand($brand);
        $category->setName("SWEATS, GILETS ET VESTES");
        $manager->persist($category);

        $product=new Product();
        $product->setCategory($category);
        $product->setProductName('Sweat - Bordeaux et blanc');
        $product->setPrice(35.00);
        $product->setStatus('En Stock');
        $product->setProductDetails("<p><strong><span style=\"color:#1abc9c\">Sweat &agrave; manches longues.</span></strong><br />
Capuche avec liens de serrage.<br />
Empi&egrave;cements contrastants.<br />
Logo et 2 poches zipp&eacute;es devant.<br />
Fermeture zipp&eacute;e.&nbsp;<br />
<strong>Coloris</strong>&nbsp;: bordeaux, blanc et bleu marine<br />
<strong>Mati&egrave;re&nbsp;</strong>: 100% polyester<br />
<strong>Entretien</strong>&nbsp;: lavage &agrave; 30&deg;C</p>");
        $product->setQuantity(200);

        $size=new ProductSize();
        $size->setProduct($product);
        $size->setSize("XS");
        $manager->persist($size);

        $size1=new ProductSize();
        $size1->setProduct($product);
        $size1->setSize("S");
        $manager->persist($size1);

        $size=new ProductSize();
        $size->setProduct($product);
        $size->setSize("M");
        $manager->persist($size);

        $image=new Image();
        $image1=new Image();
        $image->setName("products_9176938_image1_original.jpg");
        $image->setLabel("g");
        $image->setProduct($product);
        $manager->persist($image);
        $image1->setName("products_9176938_image1_original.jpg");
        $image1->setLabel("g");
        $image1->setProduct($product);
        $manager->persist($image1);
        $manager->flush();
        $manager->persist($product);
        $manager->flush();

        $product=new Product();
        $product->setCategory($category);
        $product->setProductName('Sweat - Noir et blanc');
        $product->setPrice(31.00);
        $product->setStatus('En Stock');
        $product->setProductDetails("<p><span style=\"font-size:18px\"><strong><span style=\"color:#2980b9\">Sweat &agrave; manches longues</span>.</strong></span><br />
Capuche avec liens de serrage.<br />
Poche kangourou et logo devant.<br />
Motifs fantaisie.&nbsp;<br />
<strong>Coloris</strong>&nbsp;: noir, blanc et gris<br />
<strong>Mati&egrave;re&nbsp;</strong>: 80% coton et 20% polyester<br />
<strong>Entretien</strong>&nbsp;: lavage &agrave; 30&deg;C</p>");
        $product->setQuantity(200);

        $size=new ProductSize();
        $size->setProduct($product);
        $size->setSize("XS");
        $manager->persist($size);

        $size1=new ProductSize();
        $size1->setProduct($product);
        $size1->setSize("S");
        $manager->persist($size1);

        $size=new ProductSize();
        $size->setProduct($product);
        $size->setSize("M");
        $manager->persist($size);

        $image=new Image();
        $image1=new Image();
        $image->setName("products_9176946_image1_original.jpg");
        $image->setLabel("g");
        $image->setProduct($product);
        $manager->persist($image);
        $image1->setName("products_9176946_image2_original.jpg");
        $image1->setLabel("g");
        $image1->setProduct($product);
        $manager->persist($image1);
        $manager->flush();
        $manager->persist($product);
        $manager->flush();

        $product=new Product();
        $product->setCategory($category);
        $product->setProductName('Sweat - Noir');
        $product->setPrice(43.00);
        $product->setStatus('En Stock');
        $product->setProductDetails("<p>Sweat textur&eacute; &agrave; manches longues.<br />
Capuche avec liens de serrage.<br />
3 poches zipp&eacute;es dont 1 au dos.<br />
Logo devant.<br />
Fermeture zipp&eacute;e.&nbsp;<br />
<br />
<strong>Coloris</strong>&nbsp;: noir<br />
<strong>Mati&egrave;re&nbsp;</strong>: 100% polyester&nbsp;<br />
<strong>Entretien</strong>&nbsp;: lavage &agrave; 30&deg;C</p>");
        $product->setQuantity(200);

        $size=new ProductSize();
        $size->setProduct($product);
        $size->setSize("XS");
        $manager->persist($size);

        $size1=new ProductSize();
        $size1->setProduct($product);
        $size1->setSize("S");
        $manager->persist($size1);

        $size=new ProductSize();
        $size->setProduct($product);
        $size->setSize("M");
        $manager->persist($size);

        $image=new Image();
        $image1=new Image();
        $image->setName("products_9176940_image1_original.jpg");
        $image->setLabel("g");
        $image->setProduct($product);
        $manager->persist($image);
        $image1->setName("products_9176940_image2_original.jpg");
        $image1->setLabel("g");
        $image1->setProduct($product);
        $manager->persist($image1);
        $manager->flush();
        $manager->persist($product);
        $manager->flush();


        $product=new Product();
        $product->setCategory($category);
        $product->setProductName('Sweat - Noir et gris chiné');
        $product->setPrice(35.00);
        $product->setStatus('En Stock');
        $product->setProductDetails("<p><strong><span style=\"color:#9b59b6\"><span style=\"font-size:20px\">Sweat &agrave; manches longues.</span></span></strong><br />
Col l&eacute;g&egrave;rement montant.<br />
Capuche avec liens de serrage.<br />
Poche kangourou.<br />
Logo &agrave; la poitrine et au dos.<br />
Fermeture zipp&eacute;e.&nbsp;<br />
<strong>Coloris</strong>&nbsp;: noir et gris chin&eacute;<br />
<strong>Mati&egrave;re&nbsp;</strong>: 80% coton et 20% polyester double face<br />
<strong>Entretien</strong>&nbsp;: lavage &agrave; 30&deg;C</p>");
        $product->setQuantity(200);
        $size=new ProductSize();
        $size->setProduct($product);
        $size->setSize("XS");
        $manager->persist($size);
        $size1=new ProductSize();
        $size1->setProduct($product);
        $size1->setSize("S");
        $manager->persist($size1);
        $size=new ProductSize();
        $size->setProduct($product);
        $size->setSize("M");
        $manager->persist($size);
        $image=new Image();
        $image1=new Image();
        $image->setName("products_9176951_image1_original.jpg");
        $image->setLabel("g");
        $image->setProduct($product);
        $manager->persist($image);
        $image1->setName("products_9176951_image2_original.jpg");
        $image1->setLabel("g");
        $image1->setProduct($product);
        $manager->persist($image1);
        $manager->flush();
        $manager->persist($product);
        $manager->flush();

        $product=new Product();
        $product->setCategory($category);
        $product->setProductName('Sweat - Noir et blanc');
        $product->setPrice(39.00);
        $product->setStatus('En Stock');
        $product->setProductDetails("<p><span style=\"color:#e74c3c\"><span style=\"font-size:18px\"><strong>Sweat &agrave; manches longues.</strong></span></span><br />
Capuche.<br />
Empi&egrave;cements contrastants.<br />
Lettrage au dos.<br />
Logo devant.&nbsp;<br />
<br />
<strong>Coloris</strong>&nbsp;: noir et blanc<br />
<strong>Mati&egrave;re&nbsp;</strong>: 72% coton et 28% polyester<br />
<strong>Entretien</strong>&nbsp;: lavage &agrave; 30&deg;C</p>");
        $product->setQuantity(200);
        $size=new ProductSize();
        $size->setProduct($product);
        $size->setSize("XS");
        $manager->persist($size);
        $size1=new ProductSize();
        $size1->setProduct($product);
        $size1->setSize("S");
        $manager->persist($size1);
        $size=new ProductSize();
        $size->setProduct($product);
        $size->setSize("M");
        $manager->persist($size);
        $image=new Image();
        $image1=new Image();
        $image->setName("products_9176939_image1_original.jpg");
        $image->setLabel("g");
        $image->setProduct($product);
        $manager->persist($image);
        $image1->setName("products_9176939_image2_original.jpg");
        $image1->setLabel("g");
        $image1->setProduct($product);
        $manager->persist($image1);
        $manager->flush();
        $manager->persist($product);
        $manager->flush();

        $category = new Category();
        $category->setBrand($brand);
        $category->setName("CASQUETTES ET BONNETS");
        $manager->persist($category);

        $product=new Product();
        $product->setCategory($category);
        $product->setProductName('Casquette - Noir');
        $product->setPrice(10.00);
        $product->setStatus('En Stock');
        $product->setProductDetails("<p><span style=\"font-size:18px\"><span style=\"color:#2ecc71\"><strong>Casquette &agrave; motifs fantaisie.</strong></span></span><br />
Lettrage devant.<br />
&OElig;illets d&#39;a&eacute;ration.<br />
Visi&egrave;re plate et rigide.<br />
Patte de r&eacute;glage &agrave; l&#39;arri&egrave;re.&nbsp;<br />
<br />
<strong>Coloris</strong>&nbsp;: noir et blanc<br />
<strong>Mati&egrave;re&nbsp;</strong>: 100% coton&nbsp;<br />
<strong>Entretien</strong>&nbsp;: lavage &agrave; la main</p>");
        $product->setQuantity(200);
        $image=new Image();
        $image1=new Image();
        $image->setName("products_9176650_image1_original.jpg");
        $image->setLabel("g");
        $image->setProduct($product);
        $manager->persist($image);
        $image1->setName("products_9176650_image2_original.jpg");
        $image1->setLabel("g");
        $image1->setProduct($product);
        $manager->persist($image1);
        $manager->flush();
        $manager->persist($product);
        $manager->flush();

        $product=new Product();
        $product->setCategory($category);
        $product->setProductName('Casquette - Bleu marine et bordeaux');
        $product->setPrice(14.00);
        $product->setStatus('En Stock');
        $product->setProductDetails("<p><span style=\"font-size:18px\"><span style=\"color:#27ae60\"><strong>Casquette.</strong></span></span><br />
Bandes contrastantes devant.<br />
Logo devant et au dos.<br />
Visi&egrave;re plate et rigide.<br />
&OElig;illets d&#39;a&eacute;ration.<br />
Patte de r&eacute;glage &agrave; l&#39;arri&egrave;re.&nbsp;<br />
<br />
<strong>Coloris</strong>&nbsp;: bleu marine, bordeaux et blanc<br />
<strong>Mati&egrave;re</strong>&nbsp;: 100% polyester<br />
<strong>Entretien</strong>&nbsp;: lavage &agrave; 30&deg;C</p>");
        $product->setQuantity(200);
        $image=new Image();
        $image1=new Image();
        $image->setName("products_9176977_image1_original.jpg");
        $image->setLabel("g");
        $image->setProduct($product);
        $manager->persist($image);
        $image1->setName("products_9176977_image2_original.jpg");
        $image1->setLabel("g");
        $image1->setProduct($product);
        $manager->persist($image1);
        $manager->flush();
        $manager->persist($product);
        $manager->flush();

        $category = new Category();
        $category->setBrand($brand);
        $category->setName("JOGGINGS ET SHORTS");
        $manager->persist($category);

        $product=new Product();
        $product->setCategory($category);
        $product->setProductName('Short - Noir');
        $product->setPrice(21.00);
        $product->setStatus('En Stock');
        $product->setProductDetails("<p><span style=\"font-size:18px\"><span style=\"font-family:Georgia,serif\"><span style=\"color:#2980b9\"><strong>Short.</strong></span></span></span><br />
Taille &eacute;lastique avec liens de serrage.<br />
Poche zipp&eacute;e au dos.<br />
Logo sur le c&ocirc;t&eacute; gauche.&nbsp;<br />
<br />
<strong>Coloris</strong>&nbsp;: noir<br />
<strong>Mati&egrave;re</strong>&nbsp;: 100% polyester mesh<br />
<strong>Entretien</strong>&nbsp;: lavage &agrave; 30&deg;C</p>");
        $product->setQuantity(200);
        $size=new ProductSize();
        $size->setProduct($product);
        $size->setSize("38");
        $manager->persist($size);
        $size1=new ProductSize();
        $size1->setProduct($product);
        $size1->setSize("40");
        $manager->persist($size1);
        $size=new ProductSize();
        $size->setProduct($product);
        $size->setSize("42");
        $manager->persist($size);
        $image=new Image();
        $image1=new Image();
        $image->setName("products_9176971_image1_original.jpg");
        $image->setLabel("g");
        $image->setProduct($product);
        $manager->persist($image);
        $image1->setName("products_9176971_image2_original.jpg");
        $image1->setLabel("g");
        $image1->setProduct($product);
        $manager->persist($image1);
        $manager->flush();
        $manager->persist($product);
        $manager->flush();

        $product=new Product();
        $product->setCategory($category);
        $product->setProductName('Jogging - Noir');
        $product->setPrice(31.00);
        $product->setStatus('En Stock');
        $product->setProductDetails("<p><span style=\"font-size:18px\"><strong>Jogging.</strong></span><br />
Taille &eacute;lastique avec liens de serrage.&nbsp;<br />
<br />
<strong>Coloris</strong>&nbsp;: noir et rouge<br />
<strong>Mati&egrave;re&nbsp;</strong>: 100% polyester<br />
<strong>Entretien</strong>&nbsp;: lavage &agrave; 30&deg;C</p>");
        $product->setQuantity(200);
        $size=new ProductSize();
        $size->setProduct($product);
        $size->setSize("XS");
        $manager->persist($size);
        $size1=new ProductSize();
        $size1->setProduct($product);
        $size1->setSize("S");
        $manager->persist($size1);
        $size=new ProductSize();
        $size->setProduct($product);
        $size->setSize("M");
        $manager->persist($size);
        $image=new Image();
        $image1=new Image();
        $image->setName("products_9176956_image1_original.jpg");
        $image->setLabel("g");
        $image->setProduct($product);
        $manager->persist($image);
        $image1->setName("products_9176956_image2_original.jpg");
        $image1->setLabel("g");
        $image1->setProduct($product);
        $manager->persist($image1);
        $manager->flush();
        $manager->persist($product);
        $manager->flush();

        $user = $userManager->createUser();
        $user->setUsername('partner');
        $user->setEmail('partner@gmail.com');
        $user->setPlainPassword('partner');
        $user->setEnabled(true);
        $user->addRole('ROLE_PARTNER');
        $user->setName('partner');
        $user->setfamilyName('partner');
        $manager->persist($user);
        $manager->flush();

        $logo=new BrandImage();
        $logo->setName('logo_18181.jpg');
        $brandImage=new BrandImage();
        $brandImage->setName('generic_v.jpg');
        $manager->persist($logo);
        $manager->persist($brandImage);
        $brand=new Brand();
        $brand->setBrandName(' Best Mountain');
        $brand->setDescription('<p>Depuis 1984, la marque fran&ccedil;aise&nbsp;<strong>Best Mountain</strong>&nbsp;r&eacute;invente le look casual en m&eacute;langeant les genres avec un zeste d&rsquo;originalit&eacute;. Couleurs lumineuses, basiques revisit&eacute;s et coupes faciles &agrave; porter, cette collection moderne et vari&eacute;e r&eacute;unit tous les indispensables mode de la saison.</p>');
        $brand->setLogo($logo);
        $brand->setUser($user);
        $brand->setBrandImage($brandImage);
        $brand->setTag($tag);
        $manager->persist($brand);

        $category = new Category();
        $category->setBrand($brand);
        $category->setName("FEMME");
        $manager->persist($category);

        $product=new Product();
        $product->setCategory($category);
        $product->setProductName('Blouse - Corail');
        $product->setPrice(15.00);
        $product->setStatus('En Stock');
        $product->setProductDetails("<p><span style=\"color:#8e44ad\"><span style=\"font-size:18px\"><strong>Blouse &agrave; manches courtes.</strong></span></span><br />
Col en V avec patte boutonn&eacute;e.<br />
Empi&egrave;cement en dentelle aux finitions.&nbsp;<br />
<br />
<strong>Coloris</strong>&nbsp;: corail<br />
<strong>Mati&egrave;re&nbsp;</strong>: 100% polyester<br />
<strong>Mati&egrave;re dentelle</strong>&nbsp;: 100% polyamide<br />
<strong>Entretien</strong>&nbsp;: lavage &agrave; 30&deg;C</p>");
        $product->setQuantity(200);
        $size=new ProductSize();
        $size->setProduct($product);
        $size->setSize("36");
        $manager->persist($size);
        $size1=new ProductSize();
        $size1->setProduct($product);
        $size1->setSize("38");
        $manager->persist($size1);
        $size=new ProductSize();
        $size->setProduct($product);
        $size->setSize("40");
        $manager->persist($size);
        $image=new Image();
        $image1=new Image();
        $image->setName("products_9032611_image1_original.jpg");
        $image->setLabel("g");
        $image->setProduct($product);
        $manager->persist($image);
        $image1->setName("products_9032611_image2_original.jpg");
        $image1->setLabel("g");
        $image1->setProduct($product);
        $manager->persist($image1);
        $manager->flush();
        $manager->persist($product);
        $manager->flush();

        $product=new Product();
        $product->setCategory($category);
        $product->setProductName('Robe - Bleu et blanc cassé');
        $product->setPrice(24.00);
        $product->setStatus('En Stock');
        $product->setProductDetails("<p><span style=\"color:#2c3e50\"><span style=\"font-size:18px\"><strong>Robe &agrave; motifs fantaisie.</strong></span></span><br />
Col rond zipp&eacute;.<br />
Manches courtes.<br />
2 poches.<br />
Taille &eacute;lastique avec liens &agrave; nouer.&nbsp;<br />
<br />
<strong>Coloris</strong>&nbsp;: bleu roi, bleu fonc&eacute; et blanc cass&eacute;<br />
<strong>Mati&egrave;re&nbsp;</strong>: 100% viscose<br />
<strong>Entretien</strong>&nbsp;: lavage &agrave; 30&deg;C</p>");
        $product->setQuantity(200);
        $size=new ProductSize();
        $size->setProduct($product);
        $size->setSize("36");
        $manager->persist($size);
        $size1=new ProductSize();
        $size1->setProduct($product);
        $size1->setSize("38");
        $manager->persist($size1);
        $size=new ProductSize();
        $size->setProduct($product);
        $size->setSize("40");
        $manager->persist($size);
        $image=new Image();
        $image1=new Image();
        $image->setName("products_8272410_image1_original.jpg");
        $image->setLabel("g");
        $image->setProduct($product);
        $manager->persist($image);
        $image1->setName("products_8272410_image2_original.jpg");
        $image1->setLabel("g");
        $image1->setProduct($product);
        $manager->persist($image1);
        $manager->flush();
        $manager->persist($product);
        $manager->flush();

        $product=new Product();
        $product->setCategory($category);
        $product->setProductName('Robe en dentelle - Noir');
        $product->setPrice(25.00);
        $product->setStatus('En Stock');
        $product->setProductDetails("<p><span style=\"color:#2ecc71\"><span style=\"font-size:18px\"><strong>Robe en dentelle.</strong></span></span><br />
Col tunisien avec la&ccedil;age &agrave; pompons.<br />
Manches longues.<br />
Doublure int&eacute;gr&eacute;e.<br />
Fermeture zipp&eacute;e au dos.&nbsp;<br />
<br />
<strong>Coloris</strong>&nbsp;: noir<br />
<strong>Mati&egrave;re et mati&egrave;re doublure</strong>&nbsp;: 100% polyester<br />
<strong>Entretien</strong>&nbsp;: lavage &agrave; 30&deg;C</p>");
        $product->setQuantity(200);
        $size=new ProductSize();
        $size->setProduct($product);
        $size->setSize("XS");
        $manager->persist($size);
        $size1=new ProductSize();
        $size1->setProduct($product);
        $size1->setSize("S");
        $manager->persist($size1);
        $size=new ProductSize();
        $size->setProduct($product);
        $size->setSize("M");
        $manager->persist($size);
        $image=new Image();
        $image1=new Image();
        $image->setName("products_8272426_image1_original.jpg");
        $image->setLabel("g");
        $image->setProduct($product);
        $manager->persist($image);
        $image1->setName("products_8272426_image2_original.jpg");
        $image1->setLabel("g");
        $image1->setProduct($product);
        $manager->persist($image1);
        $manager->flush();
        $manager->persist($product);
        $manager->flush();

        $product=new Product();
        $product->setCategory($category);
        $product->setProductName('Jean slim 7/8 - Bleu');
        $product->setPrice(19.00);
        $product->setStatus('En Stock');
        $product->setProductDetails("<p><span style=\"color:#2ecc71\"><span style=\"font-size:22px\"><strong>Jean slim 7/8.</strong></span></span><br />
Effet d&eacute;lav&eacute;.<br />
5 poches dont 2 au dos.<br />
Taille haute.<br />
Passants de ceinture.<br />
Fermeture zipp&eacute;e et boutonn&eacute;e.&nbsp;<br />
<strong>Coloris</strong>&nbsp;: bleu<br />
<strong>Mati&egrave;re&nbsp;</strong>: 73% coton, 25% polyester et 2% &eacute;lasthanne<br />
<strong>Entretien</strong>&nbsp;: lavage &agrave; 30&deg;C</p>");
        $product->setQuantity(200);
        $size=new ProductSize();
        $size->setProduct($product);
        $size->setSize("34");
        $manager->persist($size);
        $size1=new ProductSize();
        $size1->setProduct($product);
        $size1->setSize("36");
        $manager->persist($size1);
        $size=new ProductSize();
        $size->setProduct($product);
        $size->setSize("38");
        $manager->persist($size);
        $image=new Image();
        $image1=new Image();
        $image->setName("products_8272444_image1_original.jpg");
        $image->setLabel("g");
        $image->setProduct($product);
        $manager->persist($image);
        $image1->setName("products_8272444_image2_original.jpg");
        $image1->setLabel("g");
        $image1->setProduct($product);
        $manager->persist($image1);
        $manager->flush();
        $manager->persist($product);
        $manager->flush();

        $product=new Product();
        $product->setCategory($category);
        $product->setProductName('Jean droit - Blanc');
        $product->setPrice(24.00);
        $product->setStatus('En Stock');
        $product->setProductDetails("<p><span style=\"font-size:18px\"><span style=\"color:#8e44ad\"><strong>Jean droit.</strong></span></span><br />
5 poches dont 2 au dos.<br />
Passants de ceinture.<br />
Fermeture zipp&eacute;e et boutonn&eacute;e.<br />
<em>Ceinture incluse</em>.&nbsp;<br />
<strong>Coloris</strong>&nbsp;: blanc<br />
<strong>Mati&egrave;re&nbsp;</strong>: 98% coton et 2% &eacute;lasthanne<br />
<strong>Entretien</strong>&nbsp;: lavage &agrave; 30&deg;C</p>");
        $product->setQuantity(200);
        $size=new ProductSize();
        $size->setProduct($product);
        $size->setSize("40");
        $manager->persist($size);
        $size1=new ProductSize();
        $size1->setProduct($product);
        $size1->setSize("42");
        $manager->persist($size1);
        $size=new ProductSize();
        $size->setProduct($product);
        $size->setSize("44");
        $manager->persist($size);
        $image=new Image();
        $image1=new Image();
        $image->setName("products_9032646_image1_original.jpg");
        $image->setLabel("g");
        $image->setProduct($product);
        $manager->persist($image);
        $image1->setName("products_9032646_image2_original.jpg");
        $image1->setLabel("g");
        $image1->setProduct($product);
        $manager->persist($image1);
        $manager->flush();
        $manager->persist($product);
        $manager->flush();

        $product=new Product();
        $product->setCategory($category);
        $product->setProductName('Pull - Bleu marine et écru');
        $product->setPrice(19.00);
        $product->setStatus('En Stock');
        $product->setProductDetails("<p><span style=\"color:#27ae60\"><span style=\"font-size:20px\"><strong>Pull &agrave; manches longues.</strong></span></span><br />
Col rond.<br />
Liser&eacute; contrastant aux finitions.<br />
D&eacute;coupe et liens &agrave; nouer au dos.&nbsp;<br />
<br />
<strong>Coloris</strong>&nbsp;: bleu marine et &eacute;cru<br />
<strong>Mati&egrave;re&nbsp;</strong>: 50% acrylique et 50% coton<br />
<strong>Entretien</strong>&nbsp;: lavage &agrave; 30&deg;C</p>");
        $product->setQuantity(200);
        $size=new ProductSize();
        $size->setProduct($product);
        $size->setSize("36");
        $manager->persist($size);
        $size1=new ProductSize();
        $size1->setProduct($product);
        $size1->setSize("38");
        $manager->persist($size1);
        $size=new ProductSize();
        $size->setProduct($product);
        $size->setSize("40");
        $manager->persist($size);
        $image=new Image();
        $image1=new Image();
        $image->setName("products_9032636_image1_original.jpg");
        $image->setLabel("g");
        $image->setProduct($product);
        $manager->persist($image);
        $image1->setName("products_9032636_image2_original.jpg");
        $image1->setLabel("g");
        $image1->setProduct($product);
        $manager->persist($image1);
        $manager->flush();
        $manager->persist($product);
        $manager->flush();

        $product=new Product();
        $product->setCategory($category);
        $product->setProductName('Pull - Blanc et framboise');
        $product->setPrice(12.00);
        $product->setStatus('En Stock');
        $product->setProductDetails("<p><span style=\"color:#2ecc71\"><span style=\"font-size:22px\"><strong>Pull ray&eacute;.</strong></span></span><br />
Col en V.<br />
Manches longues&nbsp;<br />
<br />
<strong>Coloris</strong>&nbsp;: blanc et framboise<br />
<strong>Mati&egrave;re&nbsp;</strong>: 78% viscose et 22% polyester<br />
<strong>Entretien</strong>&nbsp;: lavage &agrave; 30&deg;C</p>");
        $product->setQuantity(200);
        $size=new ProductSize();
        $size->setProduct($product);
        $size->setSize("36");
        $manager->persist($size);
        $size1=new ProductSize();
        $size1->setProduct($product);
        $size1->setSize("38");
        $manager->persist($size1);
        $size=new ProductSize();
        $size->setProduct($product);
        $size->setSize("40");
        $manager->persist($size);
        $image=new Image();
        $image1=new Image();
        $image->setName("products_9032638_image1_original.jpg");
        $image->setLabel("g");
        $image->setProduct($product);
        $manager->persist($image);
        $image1->setName("products_9032638_image2_original.jpg");
        $image1->setLabel("g");
        $image1->setProduct($product);
        $manager->persist($image1);
        $manager->flush();
        $manager->persist($product);
        $manager->flush();

        $category = new Category();
        $category->setBrand($brand);
        $category->setName("HOMME");
        $manager->persist($category);

        $product=new Product();
        $product->setCategory($category);
        $product->setProductName('Polo - Blanc');
        $product->setPrice(10.00);
        $product->setStatus('En Stock');
        $product->setProductDetails("<p><span style=\"color:#2ecc71\"><span style=\"font-size:18px\"><strong>Polo &agrave; manches courtes.</strong></span></span><br />
Col avec patte boutonn&eacute;e.<br />
Blason et lettrage brod&eacute;s devant.<br />
Fente d&#39;aisance sur les c&ocirc;t&eacute;s.&nbsp;<br />
<strong>Coloris</strong>&nbsp;: blanc et bleu marine<br />
<strong>Mati&egrave;re&nbsp;</strong>: 100% coton<br />
<strong>Entretien</strong>&nbsp;: lavage &agrave; 30&deg;C</p>");
        $product->setQuantity(200);
        $size=new ProductSize();
        $size->setProduct($product);
        $size->setSize("XS");
        $manager->persist($size);
        $size1=new ProductSize();
        $size1->setProduct($product);
        $size1->setSize("S");
        $manager->persist($size1);
        $size=new ProductSize();
        $size->setProduct($product);
        $size->setSize("M");
        $manager->persist($size);
        $image=new Image();
        $image1=new Image();
        $image->setName("products_8274570_image1_original.jpg");
        $image->setLabel("g");
        $image->setProduct($product);
        $manager->persist($image);
        $image1->setName("products_8274570_image2_original.jpg");
        $image1->setLabel("g");
        $image1->setProduct($product);
        $manager->persist($image1);
        $manager->flush();
        $manager->persist($product);
        $manager->flush();

        $product=new Product();
        $product->setCategory($category);
        $product->setProductName('Polo - Bleu marine');
        $product->setPrice(12.00);
        $product->setStatus('En Stock');
        $product->setProductDetails("<p><span style=\"font-size:16px\"><span style=\"color:#1abc9c\"><strong>Polo &agrave; manches courtes.</strong></span></span><br />
Col avec patte boutonn&eacute;e.<br />
Broderie devant.<br />
Fente d&#39;aisance sur les c&ocirc;t&eacute;s.&nbsp;<br />
<br />
<strong>Coloris</strong>&nbsp;: bleu marine et jaune fluo<br />
<strong>Mati&egrave;re&nbsp;</strong>: 100% coton<br />
<strong>Entretien</strong>&nbsp;: lavage &agrave; 30&deg;C</p>");
        $product->setQuantity(200);
        $size=new ProductSize();
        $size->setProduct($product);
        $size->setSize("XS");
        $manager->persist($size);
        $size1=new ProductSize();
        $size1->setProduct($product);
        $size1->setSize("S");
        $manager->persist($size1);
        $size=new ProductSize();
        $size->setProduct($product);
        $size->setSize("M");
        $manager->persist($size);
        $image=new Image();
        $image1=new Image();
        $image->setName("products_9033987_image1_original.jpg");
        $image->setLabel("g");
        $image->setProduct($product);
        $manager->persist($image);
        $image1->setName("products_9033987_image1_original.jpg");
        $image1->setLabel("g");
        $image1->setProduct($product);
        $manager->persist($image1);
        $manager->flush();
        $manager->persist($product);
        $manager->flush();

        $product=new Product();
        $product->setCategory($category);
        $product->setProductName('T-shirt en lin - Marron clair');
        $product->setPrice(8.00);
        $product->setStatus('En Stock');
        $product->setProductDetails("<p><span style=\"font-size:16px\"><span style=\"font-family:Georgia,serif\"><strong>T-shirt en&nbsp;lin&nbsp;m&eacute;lang&eacute;.</strong></span></span><br />
Col rond.<br />
Manches courtes.&nbsp;<br />
<br />
<strong>Coloris</strong>&nbsp;: marron clair&nbsp;<br />
<strong>Mati&egrave;re&nbsp;</strong>: 55% lin et 45% viscose<br />
<strong>Entretien</strong>&nbsp;: lavage &agrave; la main</p>");
        $product->setQuantity(200);
        $size=new ProductSize();
        $size->setProduct($product);
        $size->setSize("XS");
        $manager->persist($size);
        $size1=new ProductSize();
        $size1->setProduct($product);
        $size1->setSize("S");
        $manager->persist($size1);
        $size=new ProductSize();
        $size->setProduct($product);
        $size->setSize("M");
        $manager->persist($size);
        $image=new Image();
        $image1=new Image();
        $image->setName("products_8274637_image1_original.jpg");
        $image->setLabel("g");
        $image->setProduct($product);
        $manager->persist($image);
        $image1->setName("products_8274637_image2_original.jpg");
        $image1->setLabel("g");
        $image1->setProduct($product);
        $manager->persist($image1);
        $manager->flush();
        $manager->persist($product);
        $manager->flush();

        $product=new Product();
        $product->setCategory($category);
        $product->setProductName('Pull - Bleu marine');
        $product->setPrice(15.00);
        $product->setStatus('En Stock');
        $product->setProductDetails("<p><span style=\"color:#2ecc71\"><span style=\"font-size:18px\"><span style=\"font-family:Georgia,serif\"><strong>Pull &agrave; manches longues.</strong></span></span></span><br />
Col en V.&nbsp;<br />
<strong>Coloris</strong>&nbsp;: bleu marine<br />
<strong>Mati&egrave;re&nbsp;</strong>: 55% acrylique et 45% coton<br />
<strong>Entretien</strong>&nbsp;: lavage &agrave; 30&deg;C</p>");
        $product->setQuantity(200);
        $size=new ProductSize();
        $size->setProduct($product);
        $size->setSize("XS");
        $manager->persist($size);
        $size1=new ProductSize();
        $size1->setProduct($product);
        $size1->setSize("S");
        $manager->persist($size1);
        $size=new ProductSize();
        $size->setProduct($product);
        $size->setSize("M");
        $manager->persist($size);
        $image=new Image();
        $image1=new Image();
        $image->setName("products_9033995_image1_original.jpg");
        $image->setLabel("g");
        $image->setProduct($product);
        $manager->persist($image);
        $image1->setName("products_9033995_image2_original.jpg");
        $image1->setLabel("g");
        $image1->setProduct($product);
        $manager->persist($image1);
        $manager->flush();
        $manager->persist($product);
        $manager->flush();


        $user = $userManager->createUser();
        $user->setUsername('admin');
        $user->setEmail('admin@gmail.com');
        $user->setPlainPassword('admin');
        $user->setEnabled(true);
        $user->addRole('ROLE_ADMIN');
        $user->setName('admin');
        $user->setfamilyName('admin');
        $manager->persist($user);
        $manager->flush();

        $tag=new Tag();
        $tag->setName('Beauté et Parfum');

        $logo=new BrandImage();
        $logo->setName('47803_logo_V4.jpg');
        $brandImage=new BrandImage();
        $brandImage->setName('scha.jpg');
        $manager->persist($logo);
        $manager->persist($brandImage);
        $brand=new Brand();
        $brand->setBrandName('DIADERMINE ET SCHWARZKOPF');
        $brand->setDescription("DIADERMINE ET SCHWARZKOPF");
        $brand->setLogo($logo);
        $brand->setUser($user);
        $brand->setBrandImage($brandImage);
        $brand->setTag($tag);
        $manager->persist($brand);

        $category = new Category();
        $category->setBrand($brand);
        $category->setName("DIADERMINE");
        $manager->persist($category);

        $product=new Product();
        $product->setCategory($category);
        $product->setProductName('2 eaux démaquillantes Diadermine Express 3 en 1 - 2 x 200 ml');
        $product->setPrice(5.00);
        $product->setStatus('En Stock');
        $product->setProductDetails("<p><span style=\"font-size:18px\"><span style=\"color:#27ae60\"><strong>2 eaux d&eacute;maquillantes Express 3 en 1 Diadermine.</strong></span></span><br />
Conviennent &agrave; tout type de peau.<br />
A la&nbsp;provitamine B5.<br />
D&eacute;maquillent en un seul geste le visage, les yeux et les l&egrave;vres.<br />
Purifient et hydratent.<br />
Pour un teint frais et lumineux.<br />
<br />
<strong>Conseils d&#39;application</strong>&nbsp;: appliquer matin et soir &agrave; l&#39;aide d&#39;un coton ou directement sur le visage.&nbsp;<br />
<br />
<strong>Contenance</strong>&nbsp;: 2 flacons sprays de 200 ml<br />
<strong>P&eacute;riode de conservation apr&egrave;s ouverture</strong>&nbsp;: 12 mois</p>");
        $product->setQuantity(200);
        $image=new Image();
        $image1=new Image();
        $image->setName("products_9163786_image1_original.jpg");
        $image->setLabel("g");
        $image->setProduct($product);
        $manager->persist($image);
        $manager->flush();
        $manager->persist($product);
        $manager->flush();

        $product=new Product();
        $product->setCategory($category);
        $product->setProductName('2 lotions micellaires Diadermine Apaisantes - 2 x 400 ml');
        $product->setPrice(7.00);
        $product->setStatus('En Stock');
        $product->setProductDetails("<p><strong>2 lotions micellaires apaisantes Diadermine.</strong><br />
Conviennent aux peaux s&egrave;ches et sensibles.<br />
Contiennent des micelles, particules qui capturent instantan&eacute;ment le maquillage, le s&eacute;bum et les d&eacute;p&ocirc;ts de poussi&egrave;res.<br />
Leur formule enrichie en&nbsp;huile d&#39;amande douce&nbsp;d&eacute;maquille efficacement et en un seul geste le visage, les yeux et les l&egrave;vres.<br />
Gr&acirc;ce &agrave; leur formule douce &agrave; l&#39;extrait de fleur de cerisier, la peau est plus souple et confortable.<br />
<br />
<strong>Conseils d&#39;application</strong>&nbsp;: appliquer l&#39;eau micellaire sur les yeux et le visage matin et soir &agrave; l&rsquo;aide d&rsquo;un coton. Inutile de rincer ou de frotter.&nbsp;<br />
<br />
<strong>Contenance</strong>&nbsp;: 2 flacons de 400 ml<br />
<strong>P&eacute;riode de conservation apr&egrave;s ouverture</strong>&nbsp;: 12 mois</p>");
        $product->setQuantity(200);
        $image=new Image();
        $image1=new Image();
        $image->setName("products_9163782_image1_original.jpg");
        $image->setLabel("g");
        $image->setProduct($product);
        $manager->persist($image);
        $manager->flush();
        $manager->persist($product);
        $manager->flush();

        $tag=new Tag();
        $tag->setName('High-Tec');

        $logo=new BrandImage();
        $logo->setName('logo_18208_0.jpg');
        $brandImage=new BrandImage();
        $brandImage->setName('iphone.jpg');
        $manager->persist($logo);
        $manager->persist($brandImage);
        $brand=new Brand();
        $brand->setBrandName('IPHONE RECONDITIONNÉS');
        $brand->setDescription("<p><strong>Moyen de paiement, appareil photo, logiciel de retouche, ordinateur, compagnon de jeu, GPS&hellip; Autrefois, seule Mary Poppins aurait pu transporter tout cela dans son sac &agrave; main. Maintenant, il y a l&rsquo;iPhone.</strong></p>");
        $brand->setLogo($logo);
        $brand->setUser($user);
        $brand->setBrandImage($brandImage);
        $brand->setTag($tag);
        $manager->persist($brand);

        $category = new Category();
        $category->setBrand($brand);
        $category->setName("IPHONE RECONDITIONNÉS - GRADE A+");
        $manager->persist($category);

        $product=new Product();
        $product->setCategory($category);
        $product->setProductName('iPhone 7 Plus reconditionné - 32 GB - Doré - Grade A+');
        $product->setPrice(579.00);
        $product->setStatus('En Stock');
        $product->setProductDetails("<p><strong>G&eacute;n&eacute;ral</strong><br />
<strong>Type de produit</strong>&nbsp;: iPhone 7 Plus reconditionn&eacute;<br />
<strong>Capacit&eacute;</strong>&nbsp;: 32 GB<br />
<strong>Couverture</strong>&nbsp;: 4G<br />
<strong>Syst&egrave;me d&#39;exploitation</strong>&nbsp;: iOS 10<br />
<strong>Processeur</strong>&nbsp;: puce A10 avec architecture 64 bits<br />
<strong>Co-processeur</strong>&nbsp;: co-processeur de mouvement M10 int&eacute;gr&eacute;<br />
<strong>Grade de reconditionnement</strong>&nbsp;: A+<br />
Le grade A+ correspond au plus haut niveau de reconditionnement. Le produit ne pr&eacute;sente aucune trace d&#39;utilisation hormis quelques micro-rayures &eacute;ventuelles sur la face arri&egrave;re et sur la tranche. L&#39;appareil est 100% fonctionnel, test&eacute;, contr&ocirc;l&eacute;, nettoy&eacute; par des experts et livr&eacute; avec des accessoires neufs.<br />
<br />
<strong>Prix neuf</strong>&nbsp;: 779 &euro;<br />
<br />
<strong>Affichage</strong><br />
<strong>Type</strong>&nbsp;: &eacute;cran Retina HD r&eacute;tro&eacute;clair&eacute; par LED<br />
<strong>Taille</strong>&nbsp;: 5,5&quot;<br />
<strong>R&eacute;solution</strong>&nbsp;: 1920 x 1080 px &agrave; 401 ppp<br />
<strong>Contraste</strong>&nbsp;: 1300:1<br />
<strong>Caract&eacute;ristiques compl&eacute;mentaires</strong>&nbsp;: luminosit&eacute; maximale de 625 cd/m&sup2;, pixels &agrave; double transistor, rev&ecirc;tement ol&eacute;ophobe, affichage simultan&eacute; de langues et de jeux de caract&egrave;res multiples, zoom de l&#39;&eacute;cran et acc&egrave;s facile.<br />
<br />
<strong>Audio et vid&eacute;o</strong><br />
<strong>Cam&eacute;ra</strong>&nbsp;: double capteur photo 12 MP &agrave; l&#39;arri&egrave;re avec mise au point automatique avec Focus Pixels et True Tone Flash et cam&eacute;ra FaceTime HD 7 MP &agrave; l&#39;avant<br />
<strong>Modes</strong>&nbsp;: portrait, panoramique, rafale, retardateur, d&eacute;tection des visages<br />
<strong>Vid&eacute;o</strong>&nbsp;: 4K &agrave; 30 images/s &agrave; l&#39;arri&egrave;re avec mise au point continue et True Tone Flash et vid&eacute;o HD 1080 p &agrave; 30 ou 60 i/s et 720 p &agrave; 30 i/s &agrave; l&#39;avant<br />
<strong>Son</strong>&nbsp;: haut-parleurs et microphone int&eacute;gr&eacute;s<br />
<br />
<strong>Connectivit&eacute; et navigation</strong><br />
<strong>SIM</strong>&nbsp;: Nano SIM<br />
<strong>Connectivit&eacute; sans fil</strong>&nbsp;: Wi-Fi 802.11 b/g/n/ac, Bluetooth 4.2 et NFC<br />
<strong>Connectivit&eacute; cellulaire</strong>&nbsp;: GSM/EDGE/3G/4G LTE<br />
<strong>G&eacute;olocalisation</strong>&nbsp;: GPS et GLONASS assist&eacute;s, boussole num&eacute;rique, microlocalisation iBeacon<br />
<strong>Capteurs</strong>&nbsp;: capteur d&#39;empreintes digitales Touch ID, barom&egrave;tre, acc&eacute;l&eacute;rom&egrave;tre, gyroscope 3 axes, d&eacute;tecteur de proximit&eacute;, capteur de luminosit&eacute; ambiante<br />
<br />
<strong>Bureau</strong><br />
Clavier tactile.<br />
Fonctions SMS, MMS, e-mail.<br />
Visualisation documents (Excel, Word, etc.).<br />
<br />
<strong>Batterie</strong><br />
<strong>Technologie</strong>&nbsp;: Li-ion rechargeable int&eacute;gr&eacute;e<br />
<strong>Autonomie&nbsp;</strong>: 16 jours en veille<br />
<strong>Coloris</strong>&nbsp;: dor&eacute;<br />
<strong>Poids</strong>&nbsp;: 188 g<br />
<strong>Dimensions</strong>&nbsp;: 15,8 x 7,7 x 0,73 cm<br />
<br />
Chargeur et kit mains libres inclus.&nbsp;<br />
<br />
<em>Ce produit est soumis &agrave; la garantie du fournisseur.</em>&nbsp;<br />
&nbsp;</p>");
        $product->setQuantity(200);
        $manager->persist($size);
        $image=new Image();
        $image->setName("products_9160521_image1_original.jpg");
        $image->setLabel("g");
        $image->setProduct($product);
        $manager->persist($image);
        $manager->flush();
        $manager->persist($product);
        $manager->flush();

        $product=new Product();
        $product->setCategory($category);
        $product->setProductName('iPhone 7 reconditionné - 32 GB - Noir - Grade A+');
        $product->setPrice(439.00);
        $product->setStatus('En Stock');
        $product->setProductDetails("<p><strong>G&eacute;n&eacute;ral</strong><br />
<strong>Type de produit</strong>&nbsp;: iPhone 7 reconditionn&eacute;<br />
<strong>Capacit&eacute;</strong>&nbsp;: 32 GB<br />
<strong>Couverture</strong>&nbsp;: 4G<br />
<strong>Syst&egrave;me d&#39;exploitation</strong>&nbsp;: iOS 10<br />
<strong>Processeur</strong>&nbsp;: puce A10 avec architecture 64 bits<br />
<strong>Co-processeur</strong>&nbsp;: co-processeur de mouvement M10 int&eacute;gr&eacute;<br />
<strong>Grade de reconditionnement</strong>&nbsp;: A+<br />
Le grade A+ correspond au plus haut niveau de reconditionnement. Le produit ne pr&eacute;sente aucune trace d&#39;utilisation hormis quelques micro-rayures &eacute;ventuelles sur la face arri&egrave;re et sur la tranche. L&#39;appareil est 100% fonctionnel, test&eacute;, contr&ocirc;l&eacute;, nettoy&eacute; par des experts et livr&eacute; avec des accessoires neufs.<br />
<br />
<strong>Prix neuf</strong>&nbsp;: 639 &euro;<br />
<br />
<strong>Affichage</strong><br />
<strong>Type</strong>&nbsp;: &eacute;cran Retina HD r&eacute;tro&eacute;clair&eacute; par LED<br />
<strong>Taille</strong>&nbsp;: 4,7&quot;<br />
<strong>R&eacute;solution</strong>&nbsp;: 1334 &times; 750 px &agrave; 326 ppp<br />
<strong>Contraste</strong>&nbsp;: 1400:1<br />
<strong>Caract&eacute;ristiques compl&eacute;mentaires</strong>&nbsp;: luminosit&eacute; maximale de 625 cd/m&sup2;, pixels &agrave; double transistor, rev&ecirc;tement ol&eacute;ophobe, affichage simultan&eacute; de langues et de jeux de caract&egrave;res multiples, zoom de l&#39;&eacute;cran et acc&egrave;s facile.<br />
<br />
<strong>Audio et vid&eacute;o</strong><br />
<strong>Cam&eacute;ra</strong>&nbsp;: cam&eacute;ra iSight 12 MP &agrave; l&#39;arri&egrave;re avec mise au point automatique avec Focus Pixels et True Tone Flash et cam&eacute;ra FaceTime HD 7 MP &agrave; l&#39;avant<br />
<strong>Modes</strong>&nbsp;: panoramique, rafale, retardateur, d&eacute;tection des visages<br />
<strong>Vid&eacute;o</strong>&nbsp;: 4K &agrave; 30 images/s &agrave; l&#39;arri&egrave;re avec mise au point continue et True Tone Flash et vid&eacute;o HD 1080 p &agrave; 30 ou 60 i/s et 720 p &agrave; 30 i/s &agrave; l&#39;avant<br />
<strong>Son</strong>&nbsp;: haut-parleurs et microphone int&eacute;gr&eacute;s<br />
<br />
<strong>Connectivit&eacute; et navigation</strong><br />
<strong>SIM</strong>&nbsp;: Nano SIM<br />
<strong>Connectivit&eacute; sans fil</strong>&nbsp;: Wi-Fi 802.11 b/g/n/ac, Bluetooth 4.2 et NFC<br />
<strong>Connectivit&eacute; cellulaire</strong>&nbsp;: GSM/EDGE/3G/4G LTE<br />
<strong>G&eacute;olocalisation</strong>&nbsp;: GPS et GLONASS assist&eacute;s, boussole num&eacute;rique, microlocalisation iBeacon<br />
<strong>Capteurs</strong>&nbsp;: capteur d&#39;empreintes digitales Touch ID, barom&egrave;tre, acc&eacute;l&eacute;rom&egrave;tre, gyroscope 3 axes, d&eacute;tecteur de proximit&eacute;, capteur de luminosit&eacute; ambiante<br />
<br />
<strong>Bureau</strong><br />
Clavier tactile.<br />
Fonctions SMS, MMS, e-mail.<br />
Visualisation documents (Excel, Word, etc.).<br />
<br />
<strong>Batterie</strong><br />
<strong>Technologie</strong>&nbsp;: Li-ion rechargeable int&eacute;gr&eacute;e<br />
<strong>Autonomie&nbsp;</strong>: 10 jours en veille<br />
<strong>Coloris</strong>&nbsp;: noir<br />
<strong>Poids</strong>&nbsp;: 138 g<br />
<strong>Dimensions</strong>&nbsp;: 13,8 x 6,7 x 0,71 cm<br />
<br />
Chargeur et kit mains libres inclus.<br />
<br />
<em>Ce produit est soumis &agrave; la garantie du fournisseur.</em>&nbsp;</p>");
        $product->setQuantity(200);
        $image=new Image();
        $image->setName("products_9160461_image1_original.jpg");
        $image->setLabel("g");
        $image->setProduct($product);
        $manager->persist($image);
        $manager->flush();
        $manager->persist($product);
        $manager->flush();




        $category = new Category();
        $category->setBrand($brand);
        $category->setName("IPHONE RECONDITIONNÉS - GRADE A");
        $manager->persist($category);

        $product=new Product();
        $product->setCategory($category);
        $product->setProductName('iPhone 6s Plus reconditionné - 16 GB - Gris sidéral - Grade A');
        $product->setPrice(359.00);
        $product->setStatus('En Stock');
        $product->setProductDetails("<p><strong>G&eacute;n&eacute;ral</strong><br />
<strong>Type de produit</strong>&nbsp;: iPhone 6s Plus reconditionn&eacute;<br />
<strong>Capacit&eacute;</strong>&nbsp;: 16 GB<br />
<strong>Couverture</strong>&nbsp;: 4G<br />
<strong>Syst&egrave;me d&#39;exploitation</strong>&nbsp;: iOS 10<br />
<strong>Processeur</strong>&nbsp;: coprocesseur M9<br />
<strong>Grade de reconditionnement</strong>&nbsp;: A<br />
Le grade A correspond &agrave; un produit 100% fonctionnel, test&eacute;, nettoy&eacute; et v&eacute;rifi&eacute; sur 30 points de contr&ocirc;le. Peut pr&eacute;senter des d&eacute;fauts esth&eacute;tiques mineurs.<br />
<br />
<strong>Affichage</strong><br />
<strong>Type</strong>&nbsp;: &eacute;cran tactile Retina HD avec 3D Touch<br />
<strong>Taille</strong>&nbsp;: 5,5&quot;<br />
<strong>R&eacute;solution</strong>&nbsp;: 1920 &times; 1080 px<br />
<br />
<strong>Audio et vid&eacute;o</strong><br />
<strong>Cam&eacute;ra</strong>&nbsp;: appareil photo iSight 12 MP &agrave; l&rsquo;arri&egrave;re avec autofocus et flash LED et cam&eacute;ra FaceTime 5 MP &agrave; l&#39;avant<br />
<strong>Vid&eacute;o</strong>&nbsp;: enregistrement vid&eacute;o HD<br />
<strong>Lecteur</strong>&nbsp;: MP3 et vid&eacute;o<br />
<br />
<strong>Connectivit&eacute; et navigation</strong><br />
Nano SIM.<br />
Fr&eacute;quences 850-900/1800-1900 MHz.<br />
GSM, EDGE, UMTS(3G), HSDPA(3G+), Wi-Fi, UPnP 802.11a/b/g/n/ac avec MIMO.<br />
Bluetooth 4.2.<br />
Stockage de masse USB 2.0.<br />
Prise jack 3,5 mm.<br />
Connecteur lightning.<br />
Puce GPS int&eacute;gr&eacute;e : A-GPS et GLONASS.<br />
<br />
<strong>Multim&eacute;dia</strong><br />
Microphone interne.<br />
Fonction mains libres.<br />
Lecteur MP3, AAC MP3, AAC.<br />
Sonneries polyphoniques.<br />
Compatible Java.<br />
<br />
<strong>Bureau</strong><br />
Clavier tactile.<br />
Fonctions SMS, MMS, e-mail.<br />
Visualisation documents (Excel, Word, etc.).<br />
<br />
<strong>Batterie</strong><br />
<strong>Technologie</strong>&nbsp;: Li-ion<br />
<strong>Autonomie :</strong>&nbsp;15 jours en veille et 24 h en communication<br />
<strong>Coloris :</strong>&nbsp;gris sid&eacute;ral<br />
<strong>Poids :</strong>&nbsp;192 g<br />
<strong>Dimensions :</strong>&nbsp;158,2 x 77,9 x 7,3 mm<br />
<br />
Chargeur et kit mains libres inclus.&nbsp;<br />
<br />
<em>Ce produit est soumis &agrave; la garantie du fournisseur.</em>&nbsp;</p>");
        $product->setQuantity(200);
        $image=new Image();
        $image->setName("products_9160506_image1_original.jpg");
        $image->setLabel("g");
        $image->setProduct($product);
        $manager->persist($image);
        $manager->flush();
        $manager->persist($product);
        $manager->flush();

        $tag=new Tag();
        $tag->setName('Bijoux');
        $logo=new BrandImage();
        $logo->setName('logo_18634.jpg');

        $brandImage=new BrandImage();
        $brandImage->setName('bijoux.jpg');
        $manager->persist($logo);
        $manager->persist($brandImage);

        $brand=new Brand();
        $brand->setBrandName('JEREMIE SION');
        $brand->setDescription('JEREMIE SION');
        $brand->setLogo($logo);
        $brand->setUser($user);
        $brand->setBrandImage($brandImage);
        $brand->setTag($tag);
        $manager->persist($brand);

        $category = new Category();
        $category->setBrand($brand);
        $category->setName("BAGUES");
        $manager->persist($category);

        $product=new Product();
        $product->setCategory($category);
        $product->setProductName('2 bagues dorées à l\'or jaune et cristaux Swarovski®');
        $product->setPrice(11.00);
        $product->setStatus('En Stock');
        $product->setProductDetails("<p>2 bagues&nbsp;<strong>dor&eacute;es &agrave; l&#39;or jaune</strong>&nbsp;orn&eacute;es de&nbsp;<strong>cristaux Swarovski&reg;</strong>.<br />
<br />
<em>Chaque bijou est accompagn&eacute; de son pochon.</em>&nbsp;<br />
<br />
<strong>Coloris cristaux</strong>&nbsp;: blanc<br />
<strong>Mati&egrave;re</strong>&nbsp;: m&eacute;tal dor&eacute; &agrave; l&#39;or jaune 18 carats et cristaux Swarovski&reg;</p>");
        $product->setQuantity(200);

        $size=new ProductSize();
        $size->setProduct($product);
        $size->setSize("50-52");
        $manager->persist($size);
        $size1=new ProductSize();
        $size1->setProduct($product);
        $size1->setSize("53-55");
        $manager->persist($size1);
        $size=new ProductSize();
        $size->setProduct($product);
        $size->setSize("56-58");
        $manager->persist($size);

        $image=new Image();
        $image1=new Image();
        $image->setName("products_9232463_image1_original.jpg");
        $image->setLabel("g");
        $image->setProduct($product);
        $manager->persist($image);
        $image1->setName("products_9232463_image2_original.jpg");
        $image1->setLabel("g");
        $image1->setProduct($product);
        $manager->persist($image1);
        $manager->flush();
        $manager->persist($product);
        $manager->flush();
























        /*
         // pour ajouter tag
        $tag=new Tag();
        $tag->setName('Vêtements');

        // ajouter brand
        $logo=new BrandImage();
        $logo->setName('logo_34294.jpg');

        $brandImage=new BrandImage();
        $brandImage->setName('generic_v4.jpg');

        $manager->persist($logo);
        $manager->persist($brandImage);
        $brand=new Brand();
        $brand->setBrandName('Unkut Paris');
        $brand->setDescription('');
        $brand->setLogo($logo);
        $brand->setUser($user);
        $brand->setBrandImage($brandImage);
        $brand->setTag($tag);
        $manager->persist($brand);
// ajouter categ
        $category = new Category();
        $category->setBrand($brand);
        $category->setName("T-shirts et polos");
        $manager->persist($category);
       // ajouter product
        $product=new Product();
        $product->setCategory($category);
        $product->setProductName('Sweat - Noir');
        $product->setPrice(43.00);
        $product->setStatus('En Stock');
        $product->setProductDetails("");
        $product->setQuantity(200);
        $size=new ProductSize();
        $size->setProduct($product);
        $size->setSize("XS");
        $manager->persist($size);
        $size1=new ProductSize();
        $size1->setProduct($product);
        $size1->setSize("S");
        $manager->persist($size1);
        $size=new ProductSize();
        $size->setProduct($product);
        $size->setSize("M");
        $manager->persist($size);
        $image=new Image();
        $image1=new Image();
        $image->setName("products_9176940_image1_original.jpg");
        $image->setLabel("g");
        $image->setProduct($product);
        $manager->persist($image);
        $image1->setName("products_9176940_image2_original.jpg");
        $image1->setLabel("g");
        $image1->setProduct($product);
        $manager->persist($image1);
        $manager->flush();
        $manager->persist($product);
        $manager->flush();
        */
    }
}