<?php
/**
 * Created by PhpStorm.
 * User: fate
 * Date: 15/2/7
 * Time: 下午10:18
 */

namespace View;


class Blitz implements \Yaf\View_Interface
{

    private $__instance                     =   NULL;
    private $__template_file                =   '';

    public function __construct($_template_file, $_settings = NULL) {
        $this->__instance                   =   new \Blitz();
        $this->__template_file              =   $_template_file;
    }

    /**
     * Return the template engine object
     *
     * @return Blitz
     */
    public function getEngine() {
        return $this->__instance;
    }

    /**
     * Set the path to the templates
     *
     * @param string $path The directory to set as the path.
     * @return void
     */
    public function setScriptPath($path)
    {

        return ;
    }

    /**
     * Retrieve the current template directory
     *
     * @return string
     */
    public function getScriptPath()
    {
        return ;
    }

    /**
     * Assign variables to the template
     *
     * Allows setting a specific key to the specified value, OR passing
     * an array of key => value pairs to set en masse.
     *
     * @see __set()
     * @param string|array $spec The assignment strategy to use (key or
     * array of key => value pairs)
     * @param mixed $value (Optional) If assigning a named variable,
     * use this as the value.
     * @return void
     */
    public function assign($spec, $value = null) {
        if (is_array($spec)) {
            $this->__instance->set($spec);
            return;
        }

        $this->__instance->set([$spec=>$value]);
        //t($spec);
    }

    public function __set($property, $value) {
        $this->assign($property, $value);
    }

    /**
     * Clear all assigned variables
     *
     * Clears all variables assigned to Zend_View either via
     * {@link assign()} or property overloading
     * ({@link __get()}/{@link __set()}).
     *
     * @return void
     */
    public function clearVars() {
        $this->__instance->clean();
    }

    /**
     * Processes a template and returns the output.
     *
     * @param string $name The template to process.
     * @return string The output.
     */
    public function render($name, $value = NULL) {
        $this->__instance->load(file_get_contents($this->__template_file));
        return $this->__instance->display();
    }

    public function display($name, $value = NULL) {
        return $this->render($name, $value);
    }

}