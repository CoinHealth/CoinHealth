<?php

namespace App\Http\Controllers\News;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use App\Events\AskHealth;

class HomeController extends Controller
{



  public function getIndex()
  {
    $client = new Client([
      'base_uri' => 'http://acsyshealthguide.appspot.com/api/healthupdates/',
    ]);
    $response = $client->request('GET', 'format/json');
    $body = $response->getBody();
    $data = [
      'news' => json_decode($body),
    ];
    return view('main.news.home')->with($data);
  }

  public function getNewsblog()
  {
    if(auth()->user())
      event(new AskHealth(auth()->user()));
    $client = new Client([
      'base_uri' => 'http://acsyshealthguide.appspot.com/api/healthupdates/',
    ]);
    $response = $client->request('GET', 'format/json');
    $body = $response->getBody();
    $data = [
      'news' => json_decode($body),
    ];
    return view('main.news.news-blog')->with($data);
  }

  public function getNew()
  {
    return view('main.news.news');
  }

  public function getSingle(Request $request)
  {
    $removeNode = function(Crawler $crawler) {
      foreach($crawler as $node)
        $node->parentNode->removeChild($node);
    };

    if ($request->has('url')) {
      $client = new Client();
      $response = $client->get($request->input('url'));
      $body = $response->getBody()->getContents();
      $crawler = new Crawler($body);

      $crawler = $crawler->filter('body article');

      if (!$crawler->count())
        return view('main.news.error');

      $crawler->filter('.share-btns')->each($removeNode);
      $crawler->filter('.panel')->each($removeNode);
      $crawler->filter('div.aside')->each($removeNode);
      $crawler->filter('p:nth-child(-n+5)')->each($removeNode);
      // dd($crawler->html());
      $data = [
        'header' => $crawler->filter('header'),
        'source' => $request->input('url'),
        'body' => $crawler->html(),
        'remover' => $removeNode,
      ];

      return view('main.news.single')->with($data);


    }
  }

}
