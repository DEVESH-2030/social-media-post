<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Abraham\TwitterOAuth\TwitterOAuth;


class TwitterController extends Controller
{
    protected $consumerKey;
    protected $consumerSecret;

    public function __construct()
    {
        $this->consumerKey = config('services.twitter.cousumer_key');
        $this->consumerSecret = config('services.twitter.cousumer_secret');
    }
    public function getPost()
    {
        return view('social_media.twitter');
    }

    public function twitterConnect(Request $request)
    {
        $callback = route('twitter-cbk');

        $twitter_connect = new TwitterOAuth($this->consumerKey, $this->consumerSecret);

        $access_token = $twitter_connect->oauth("oauth/request_token", ["oauth_callback" => $callback]);

        $route = $twitter_connect->url('oauth/authorize', ['oauth_token' => $access_token['oauth_token']]);

        return redirect($route);
    }

    public function twitterCBK(Request $request)
    {
        $oauth_token = !empty($request['oauth_token']) ? $request['oauth_token'] : "";
        $oauth_verifier = !empty($request['oauth_verifier']) ? $request['oauth_verifier'] : "";

        $twitter_connect = new TwitterOAuth($this->consumerKey, $this->consumerSecret, $oauth_token, $oauth_verifier);

        $twitter = $twitter_connect->oauth("oauth/access_token", ["oauth_verifier" => $oauth_verifier]);

        $access_token = !empty($twitter['oauth_token']) ? $twitter['oauth_token'] : "";
        $oauth_token_secret = !empty($twitter['oauth_token_secret']) ? $twitter['oauth_token_secret'] : "";

        return $this->postMessage($access_token, $oauth_token_secret);
    }

    public function postMessage($access_token, $oauth_token_secret)
    {
        $twitter = new TwitterOAuth($this->consumerKey, $this->consumerSecret, $access_token, $oauth_token_secret);
        $twitter->setTimeouts(10, 15);

        $twitter->post('statuses/update', ['status' => "This is my first tweet as a testing purpose"]);

        // $twitter->post('2/tweets', ['status' => "This is my first tweet as a testing purpose"]);
        // dd($twitter);

        return redirect()->route('/');
    }
}
