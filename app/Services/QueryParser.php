<?php

namespace App\Services;

/**
 * Parses query string to get data
 * for various charges
 */
class QueryParser {
	/**
	 * Necessary operands to build SQL queries
	 */
	protected $operands = [
		'=' => '=',
		'[gt]' => '>',
		'[gte]' => '>=',
		'[lt]' => '<',
		'[lte]' => '<=',
		'[like]' => 'like',
	];

	/**
	 * Parses URL string into indivdual params
	 *
	 * @param  string $queryParams incoming query string/params
	 * @return array parsed conditions
	 */
	public function parse($queryParams)
	{
		$paramChunks = explode('&', $queryParams);
		foreach ($paramChunks as $param) {
			foreach (array_keys($this->operands) as $operand) {
				if (strpos($param, $operand) !== false) {
					$this->conditions[] = array_merge(explode($operand, $param), array($operand));
				}
			}
		}

		return $this;
	}

	/**
	 * Sort our query params conditions into eloquent format
	 * [COLUMN, OPERATOR, VALUE]
	 *
	 * @return array formatted conditions array for use in Eloquent queries
	 */
	public function convertToEloquent()
	{
		foreach ($this->conditions as $key => $row) {
			$column = $row[0];
			$value = $row[1];
			$operator = $this->operands[$row[2]];

			//make the string variable for LIKE query
			//NOTE: '%' in the front of string slows down performance
			if ($operator == 'like') {
				$value = '%' . $value . '%';
			}

			//need to convert to unix timestamp
			if ($column == 'from' || $column == 'to') {
				$value = strtotime($value);
				$column = 'created';
			}

			$eloquentConditions[$key] = [$column, $operator, $value];

		}
		return $eloquentConditions;
	}
}