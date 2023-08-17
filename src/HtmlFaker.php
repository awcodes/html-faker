<?php

namespace Awcodes\HtmlFaker;

use Faker\Factory;
use Faker\Generator;
use Illuminate\Support\Str;

class HtmlFaker
{
    protected Generator $faker;

    protected string $output = '';

    public static function make(): static
    {
        $static = new static();
        $static->faker = Factory::create();

        return $static;
    }

    public function heading(int | string | null $level = 2): static
    {
        $this->output .= '<h' . $level . '>' . Str::title($this->faker->words(rand(3, 8), true)) . '</h' . $level . '>';

        return $this;
    }

    public function paragraphs(int $count = 1, bool $withRandomLinks = false): static
    {
        if ($withRandomLinks) {
            $this->output .= '<p>' . collect($this->faker->paragraphs($count))->map(function ($paragraph) {
                    return $paragraph . ' <a href="' . $this->faker->url() . '">' . $this->faker->words(rand(3, 8), true) . '</a>';
                })->implode('</p><p>') . '</p>';

            return $this;
        } else {
            $this->output .= '<p>' . collect($this->faker->paragraphs($count))->implode('</p><p>') . '</p>';
        }

        return $this;
    }

    public function unorderedList(int $count = 1): static
    {
        $this->output .= '<ul><li>' . collect($this->faker->words($count))->implode('</li><li>') . '</li></ul>';

        return $this;
    }

    public function orderedList(int $count = 1): static
    {
        $this->output .= '<ol><li>' . collect($this->faker->words($count))->implode('</li><li>') . '</li></ol>';

        return $this;
    }

    public function image(?int $width = 640, ?int $height = 480): static
    {
        $this->output .= '<img src="' . $this->faker->imageUrl($width, $height) . '" alt="' . $this->faker->sentence . '" width="' . $width . '" height="' . $height . '">';

        return $this;
    }

    public function link(): static
    {
        $this->output .= '<a href="' . $this->faker->url() . '">' . $this->faker->words(rand(3, 8), true) . '</a>';

        return $this;
    }

    public function video(?string $provider = 'youtube', ?int $width = 640, ?int $height = 480): static
    {
        if ($provider === 'vimeo') {
            $this->output .= '<iframe width="' . $width . '" height="' . $height . '" src="https://player.vimeo.com/video/' . $this->faker->numberBetween(1, 999999999) . '" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>';
        } else {
            $this->output .= '<iframe width="' . $width . '" height="' . $height . '" src="https://www.youtube.com/embed/' . $this->faker->regexify('[a-zA-Z0-9_-]{11}') . '" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        }

        return $this;
    }

    public function details(): static
    {
        $this->output .= '<details><summary>' . $this->faker->sentence() . '</summary><div>' . $this->faker->paragraph() . '</div></details>';

        return $this;
    }

    public function code(string | null $className = 'hljs'): static
    {
        $this->output .= "<pre class=\"{$className}\"><code>export default function testComponent({\n\nstate,\n\n}) {\n\nreturn {\n\nstate,\n\ninit: function () {\n\n// Initialise the Alpine component here, if you need to.\n\n},\n\n}\n\n}</code></pre>";

        return $this;
    }

    public function blockquote(): static
    {
        $this->output .= '<blockquote>' . $this->faker->sentence() . '</blockquote>';

        return $this;
    }

    public function hr(): static
    {
        $this->output .= '<hr>';

        return $this;
    }

    public function br(): static
    {
        $this->output .= '<br>';

        return $this;
    }

    public function table(): static
    {
        $this->output .= '<table><thead><tr><th>' . collect($this->faker->words(rand(3, 8)))->implode('</th><th>') . '</th></tr></thead><tbody><tr><td>' . collect($this->faker->words(rand(3, 8)))->implode('</td><td>') . '</td></tr><tr><td>' . collect($this->faker->words(rand(3, 8)))->implode('</td><td>') . '</td></tr></tbody></table>';

        return $this;
    }

    public function generate(): string
    {
        return $this->output;
    }
}
