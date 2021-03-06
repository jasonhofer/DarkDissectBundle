<?php

namespace Dark\DissectBundle\Builder;

use Dissect\Lexer\Lexer;
use Dissect\Parser\LALR1\LALR1Parser;
use Dissect\Parser\Grammar;

/**
 * Language class, with precomputed lexer and grammar
 *
 * @author Evgeniy Guseletov <d46k16@gmail.com>
 */
class Language
{
    private $lexer;
    private $parser;

    public function __construct(Lexer $lexer, Grammar $grammar)
    {
        $this->lexer = $lexer;
        $this->parser = new LALR1Parser($grammar);
    }

    public function read($string)
    {
        $stream = $this->lexer->lex($string);

        return $this->parser->parse($stream);
    }
}
