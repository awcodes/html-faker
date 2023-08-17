<?php

namespace Awcodes\HtmlFaker;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Awcodes\FakerHtml\Commands\FakerHtmlCommand;

class HtmlFakerServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('html-faker');
    }
}
