<?php
namespace Pandora3\Widgets\FieldRadio;

use Pandora3\Widgets\FormField\FormField;

/**
 * Class FieldRadio
 * @package Pandora3\Widgets\FieldRadio
 */
class FieldRadio extends FormField {

	/** @var array $options */
	protected $options;

	/**
	 * @param string $name
	 * @param mixed $value
	 * @param array $options
	 * @param array $context
	 */
	public function __construct(string $name, $value, array $options = [], array $context = []) {
		$this->options = $options;
		parent::__construct($name, $value, $context);
	}
	
	/**
	 * @param string $name
	 * @param mixed $value
	 * @param array $context
	 * @return static
	 */
	public static function create(string $name, $value, array $context = []) {
		return new static($name, $value, $context['options'] ?? [], $context);
	}

	/**
	 * {@inheritdoc}
	 */
	protected function getView(): string {
		return __DIR__.'/Views/Widget';
	}

	/**
	 * {@inheritdoc}
	 */
	public function setValue($value): void {
		if (is_bool($value)) {
			$value = (int) $value;
		}
		parent::setValue($value);
	}

	/**
	 * {@inheritdoc}
	 */
	protected function getContext(): array {
		return array_replace( parent::getContext(), [
			'options' => $this->options
		]);
	}

}