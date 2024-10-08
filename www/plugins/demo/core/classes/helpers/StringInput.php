<?php


namespace Demo\Core\Classes\Helpers;


use Illuminate\Console\OutputStyle;
use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Component\Console\Exception\RuntimeException;
use Symfony\Component\Console\Formatter\OutputFormatterInterface;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputInterface;

class StringInput implements InputInterface
{


    protected $option;
    protected $arguments;
    protected $interactive = false;

    /**
     * Returns the first argument from the raw parameters (not parsed).
     *
     * @return string The value of the first argument or null otherwise
     */
    public function getFirstArgument()
    {
        return null;
    }

    /**
     * Returns true if the raw parameters (not parsed) contain a value.
     *
     * This method is to be used to introspect the input parameters
     * before they have been validated. It must be used carefully.
     *
     * @param string|array $values The values to look for in the raw parameters (can be an array)
     * @param bool $onlyParams Only check real parameters, skip those following an end of options (--) signal
     *
     * @return bool true if the value is contained in the raw parameters
     */
    public function hasParameterOption($values, $onlyParams = false)
    {
        return false;
    }

    /**
     * Returns the value of a raw option (not parsed).
     *
     * This method is to be used to introspect the input parameters
     * before they have been validated. It must be used carefully.
     *
     * @param string|array $values The value(s) to look for in the raw parameters (can be an array)
     * @param mixed $default The default value to return if no result is found
     * @param bool $onlyParams Only check real parameters, skip those following an end of options (--) signal
     *
     * @return mixed The option value
     */
    public function getParameterOption($values, $default = false, $onlyParams = false)
    {
        return [];
    }

    /**
     * Binds the current Input instance with the given arguments and options.
     *
     * @param InputDefinition $definition A InputDefinition instance
     */
    public function bind(InputDefinition $definition)
    {
        // TODO: Implement bind() method.
    }

    /**
     * Validates the input.
     *
     * @throws RuntimeException When not enough arguments are given
     */
    public function validate()
    {
        // TODO: Implement validate() method.
    }

    /**
     * Returns all the given arguments merged with the default values.
     *
     * @return array
     */
    public function getArguments()
    {
        return $this->arguments;
    }

    /**
     * Returns the argument value for a given argument name.
     *
     * @param string $name The argument name
     *
     * @return mixed The argument value
     *
     * @throws InvalidArgumentException When argument given doesn't exist
     */
    public function getArgument($name)
    {
        return $this->arguments[$name];
    }

    /**
     * Sets an argument value by name.
     *
     * @param string $name The argument name
     * @param string $value The argument value
     *
     * @throws InvalidArgumentException When argument given doesn't exist
     */
    public function setArgument($name, $value)
    {
        $this->arguments[$name] = $value;
    }

    /**
     * Returns true if an InputArgument object exists by name or position.
     *
     * @param string|int $name The InputArgument name or position
     *
     * @return bool true if the InputArgument object exists, false otherwise
     */
    public function hasArgument($name)
    {
        return array_key_exists($name, $this->arguments);
    }

    /**
     * Returns all the given options merged with the default values.
     *
     * @return array
     */
    public function getOptions()
    {
        return $this->option;
    }

    /**
     * Returns the option value for a given option name.
     *
     * @param string $name The option name
     *
     * @return mixed The option value
     *
     * @throws InvalidArgumentException When option given doesn't exist
     */
    public function getOption($name)
    {
        return $this->option[$name];
    }

    /**
     * Sets an option value by name.
     *
     * @param string $name The option name
     * @param string|bool $value The option value
     *
     * @throws InvalidArgumentException When option given doesn't exist
     */
    public function setOption($name, $value)
    {
        $this->option[$name] = $value;
    }

    /**
     * Returns true if an InputOption object exists by name.
     *
     * @param string $name The InputOption name
     *
     * @return bool true if the InputOption object exists, false otherwise
     */
    public function hasOption($name)
    {
        return array_key_exists($name, $this->option);
    }

    /**
     * Is this input means interactive?
     *
     * @return bool
     */
    public function isInteractive()
    {
        return $this->interactive;
    }

    /**
     * Sets the input interactivity.
     *
     * @param bool $interactive If the input should be interactive
     */
    public function setInteractive($interactive)
    {
        $this->interactive = $interactive;
    }
}