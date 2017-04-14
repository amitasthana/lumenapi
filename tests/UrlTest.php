<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class UrlTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->get('/');

        $this->assertEquals(
            $this->app->version(), $this->response->getContent()
        );
    }



    public function testPostingUrl()
    {
        $this->json('POST', '/url', ['desktop_url' => 'https://evernote.com/Home.desktop',
                                    'mobile_url' => 'https://evernote.com/Home.mobile' ])
             ->seeJson([
                'success' => true,
             ]);
    }

    public function testPostingAnyUrl()
    {
        $this->json('POST', '/url/any', ['url' => 'https://evernote.com/Home.desktop'])
             ->seeJson([
                'success' => true,
             ]);
    }


    public function testGetUrl()
    {
        $this->json('GET', '/url' )
             ->seeJson([
                'mobile_clicks' => 0,
                'desktop_clicks' => 0,
             ]);
    }


    public function testDatabaseInsert()
    {
        $this->json('POST', '/url', ['desktop_url' => 'https://evernote.com/Home.desktop',
                                    'mobile_url' => 'https://evernote.com/Home.mobile' ])
             ->seeJson([
                'success' => true,
        ]);

        $this->seeInDatabase('urls', ['mobile_clicks' => 0]);

    }


}
