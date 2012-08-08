<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Part_cart {
    public $ci;             // holds reference pointer to CI object
    public $cart = array(); // array to store cart
    private $session_var = 'shopping_cart'; // name of the session variable to be used
 
    // constructor
    function __construct() {
        $this->ci = &get_instance(); //put reference to codeigniter object for this application
        $this->_get_cart();  // get the cart from session to array
    }
 
    /* Gets the cart from session
     * access: private
     */
    function _get_cart() {
        $cart = $this->ci->session->userdata($this->session_var);
        if(!empty($cart))
            $this->cart = unserialize($cart);
    }
 
    /* saves the cart to session
     * access: private
     */
    function _save_cart() {
        return $this->ci->session->set_userdata($this->session_var, serialize($this->cart));
    }
 
    /* add items to cart
     * access: public
     * @param: id =  String or integer, unique id used to determine the product generally database id
     * @param: quantity = Integer, quantity of product added in cart
     */
    function add($id, $quantity) {
        $this->cart[$id] = $quantity;
        $this->_save_cart();
    }
 
    /* Updates cart specific item
     * access: public
     * @param: id =  String or integer, unique id used to determine the product generally database id
     * @param: quantity = Integer, quantity of product added in cart
     */
    function update($id, $quantity) {
        $this->cart[$id] = $quantity;
        $this->_save_cart();
    }
 
    /* Removes items from cart
     * access: public
     * @param: id =  String or integer, unique id used to determine the product generally database id
     */
    function remove($id) {
        unset($this->cart[$id]);
        $this->_save_cart();
    }
 
    /* Clear all contents of cart
     * access: public
     */
    function clear() {
        $this->cart = array();
        $this->_save_cart();
    }
 
    /* Returns the total number of items in cart
     * access: public
     * return integer
     */
    function count() {
        return count($this->cart);
    }
 
    /* Returns the items array in cart
     * access: public
     * return array
     * sample return data
     * $cart = $this->shopping_cart->items();
     * when integer id
     * $cart = array(
     *              [1] => 3,
     *              [2] => 5
     *          )
     * when string id
     * $cart = array(
     *              [mango] => 3,
     *              [banana] => 5
     *          )
     */
    function items() {
        return $this->cart;
    }
}