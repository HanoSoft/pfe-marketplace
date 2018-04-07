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


        /*
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