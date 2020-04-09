# Fontawesome version 5

If you are looking to use font-awesome version 5, this is it!
Head over to [FontAwesome] to view all nice looking icons

# Laravel installation
1. pull in the package
```sh
$ npm install font-awesome5
```
2. In your webpack.mix.js, your "mix.js" should copy the font-awesome fonts.
> mix.js('resources/assets/js/app.js', 'public/js')
>   .version()
>   .sass('resources/assets/sass/app.scss', 'public/css')
>   .copy('node_modules/font-awesome5/webfonts', 'public/assets/fonts');
3. In your "app.scss" file, bring in the font-awesome css
> // Font awsome
> $fa-font-path: "/assets/fonts";
> @import "node_modules/font-awesome5/scss/fontawesome";
> @import "node_modules/font-awesome5/scss/fa-solid";
> @import "node_modules/font-awesome5/scss/fa-brands";
> @import "node_modules/font-awesome5/scss/fa-regular";
4. Compile your a new "app.css"
```sh
$ npm run dev
```


(Thanks to [Dillinger] helping me format this readme)

License
----
MIT

[//]: # (These are reference links used in the body of this note and get stripped out when the markdown processor does its job. There is no need to format nicely because it shouldn't be seen. Thanks SO - http://stackoverflow.com/questions/4823468/store-comments-in-markdown-syntax)


   [FontAwesome]: <https://fontawesome.com>
   [Dillinger]: <https://dillinger.io>
