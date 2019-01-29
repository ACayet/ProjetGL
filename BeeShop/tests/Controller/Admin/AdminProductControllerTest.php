<?php

namespace App\tests\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Article;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\DomCrawler\Form;
use Goutte\Client;


class AdminProductControllerTest extends WebTestCase
{
    /** @test */
        public function index(){
            $client = static::createClient();
            $client->request('GET', '/admin/produit');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $crawler = $client->request('GET', '/admin/produit');

        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("boutique")')->count()
        );
        
    }

    /**
     * @dataProvider provideUrls
     * @test
     */
    public function testPageIsSuccessful($url)
    {
        $client = self::createClient();
        $client->request('GET', $url);

        $this->assertTrue($client->getResponse()->isSuccessful());
    }

    public function provideUrls()
    {
        return [
            ['/admin/produit'],
        ];
    }

    /**@test */
    public function click()
    {
        $client = static::createClient();
        $client->request('GET', '/admin/produit');
        $crawler = $client->request('GET', '/admin/produit');

        /**
         * trouver tous les liens avec 
         * comme texte => le titre du produit
         */
        $linkEdit = $crawler
            ->filter('a:contains("Editer")')
            ->eq(1)
            ->link()
        ;

        $linkNew = $crawler
            ->filter('a:contains("Créer un nouveau produit")')
            ->eq(1)
            ->link()
         ;
        /**
         * cliquer sur le lien 
         */
        $crawler = $client->click($linkEdit);
        $crawler = $client->click($linkNew);
    }

    /**
     * Editer un produit
     * @test 
     * */
    public function editPage()
    {
        
        $client = static::createClient();
        $client->request('GET', 'admin/produit/18');

        $fake = static::createClient();
        $fake->request('GET', 'admin/produit/0');

    //    $this->assertTrue($client->getResponse()->isSuccessful(), 'response status is 2xx');
     //   $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertFalse($client->getResponse()->isNotFound());
        $this->assertTrue($fake->getResponse()->isNotFound());
        $this->assertContains('produits', $client->getResponse()->getContent());

        $crawler = $client->request('GET', 'admin/produit/18');
        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Editer")')->count()
        );
    }

    /**
     * @test
     * formulaire de creation d'un article  
     * */
    public function newPage()
    {
        $client = static::createClient();

        $client->request('GET', 'admin/produit/create');
        $crawler = $client->request('GET', 'admin/produit/create');

        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Sauvegarder")')->count()
        );
     
    }

    /** @test */
    public function form()
    {
        $client = new Client();

        $crawler = $client->request('GET', 'http://localhost:8000/admin/produit/create');

        $form = $crawler->selectButton('Sauvegarder')->form();
        
        // submit the form 
        $crawler = $client->submit($form);

        $this->assertTrue($crawler->filter('html:contains("produit")')->count() > 0);
        $this->assertFalse($crawler->filter('html:contains("Editer")')->count() > 0); 
    }
}