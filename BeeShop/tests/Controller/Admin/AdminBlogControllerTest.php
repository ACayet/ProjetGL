<?php 

namespace App\tests\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Article;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\DomCrawler\Form;
use Goutte\Client;

class AdminBlogControllerTest extends WebTestCase
{
    /** @test */
    public function index(){
        $client = static::createClient();
        $client->request('GET', '/admin/blog');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $crawler = $client->request('GET', '/admin/blog');

        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Gestion")')->count()
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
            ['/admin/blog'],
        ];
    }

    /**@test */
    public function click()
    {
        $client = static::createClient();
        $client->request('GET', '/admin/blog');
        $crawler = $client->request('GET', '/admin/blog');

        /**
         * trouver tous les liens avec 
         * comme texte => le titre de l'article
         */
        $linkEdit = $crawler
            ->filter('a:contains("Editer")')
            ->eq(1)
            ->link()
        ;

        $linkNew = $crawler
            ->filter('a:contains("Créer un nouvel article")')
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
     * @test */
    public function editPage()
    {
        $client = static::createClient();
        $client->request('GET', 'admin/blog/4');

        $fake = static::createClient();
        $fake->request('GET', 'admin/blog/100');

        $this->assertTrue($client->getResponse()->isSuccessful(), 'response status is 2xx');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertFalse($client->getResponse()->isNotFound());
        $this->assertTrue($fake->getResponse()->isNotFound());
        $this->assertContains('produits', $client->getResponse()->getContent());

        $crawler = $client->request('GET', 'admin/blog/4');
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

        $client->request('GET', 'admin/blog/create');
        $crawler = $client->request('GET', 'admin/blog/create');

        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Sauvegarder")')->count()
        );

        // asserts that the response content contains a string
        $this->assertContains('admin', $client->getResponse()->getContent());

      
     
    }

    /** @test */
    public function form()
    {
        $client = new Client();
        //$client = static::createClient();

        
        $crawler = $client->request('GET', 'http://localhost:8000/admin/blog/create');
        
        //$client->followRedirects(true);
        //$crawler = $client->request('GET', 'admin/blog/create');

   
        //$form = $crawler->filter('btn btn-primary')->form();
        $form = $crawler->selectButton('Sauvegarder')->form();
            
        // set some values
        // $form['form_name[titre]'] = 'Article Test';
        // $form['auteur'] = 'Lucas';
        // $form['contenu'] = 'Hey there! this is a test';

        // submit the form
        
        $crawler = $client->submit($form);

        $this->assertTrue($crawler->filter('html:contains("blog")')->count() > 0);
        $this->assertFalse($crawler->filter('html:contains("Editer")')->count() > 0); 
    }

}