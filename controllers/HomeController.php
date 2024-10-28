<?php
require_once __DIR__ . '/../models/Post.php';

class HomeController {
    private $postModel;

    public function __construct() {
        // Initialize the Post model to access post data
        $this->postModel = new Post();
    }

    /**
     * Get featured posts or announcements for the home page.
     * 
     * @return array Array of posts or announcements to display on the homepage.
     */
    public function getFeaturedContent() {
        // Fetch a list of featured posts for the homepage
        return $this->postModel->getFeaturedPosts();
    }

    /**
     * Display a welcome message for the home page.
     * This could be personalized based on user data or set as a standard message.
     *
     * @return string Welcome message to display on the home page.
     */
    public function getWelcomeMessage() {
        return "Welcome to FUTO Locate - Your hub for finding resources and connecting!";
    }
}
?>
