# Changelog

<a name="2020.10.3"></a>
## 2020.10.3 (2021-02-12)

### Fixed

- 💚 Fixes `.env` using Redis and hopefully file cache deletion [[5be4b08](https://github.com/skyunlimitedinc/acs/commit/5be4b088e5ba925d482cd2e4c38b2f727c03ff1a)]
- 💚 Band-aid fix for the deletion problems during deployment [[c583363](https://github.com/skyunlimitedinc/acs/commit/c5833630ee6c8d5f6a0e9d6a2ee9c9b9655750cb)]
- 💚 Hope to fix deletion problems during deployment [[4341b8b](https://github.com/skyunlimitedinc/acs/commit/4341b8b935886e23bba44259f4fcdda9ce38efe8)]


<a name="2020.10.2"></a>
## 2020.10.2 (2021-02-12)

### Added

- 👷‍♂️ Save some time during artisan commands [[e9bdb90](https://github.com/skyunlimitedinc/acs/commit/e9bdb90d55d21f146b0931e533c573cf8a6704cb)]
- 👷‍♂️ Set deployment to run from two branches [[d7d3c69](https://github.com/skyunlimitedinc/acs/commit/d7d3c691e0e03103244b057e5c5201d97bcf2d2b)]

### Changed

- 🔧 Updates encodec environment file with Redis info [[30998bd](https://github.com/skyunlimitedinc/acs/commit/30998bd0c892d088920cadbf41cedc8f149de60e)]
- 🚨 Lints the deployment shell script [[a5c615d](https://github.com/skyunlimitedinc/acs/commit/a5c615d72eb33948373ab994da47b459fc80ce7d)]

### Fixed

- 🐛 Updates encoded environment file with Redis info [[0a59733](https://github.com/skyunlimitedinc/acs/commit/0a5973376a6294797cf50d6678bd6b82ea712f65)]
- 💚 Sets environment file to use redis for caching [[39c59de](https://github.com/skyunlimitedinc/acs/commit/39c59de34b37c5fdc0a25bedbf87752ce9eb82e0)]


<a name="2020.10.1"></a>
## 2020.10.1 (2021-02-05)

### Miscellaneous

- 🔨 Updates the docker compose file to the 'master' version [[20b573a](https://github.com/skyunlimitedinc/acs/commit/20b573ad9b84006253b06b1e811452937f7b0515)]


<a name="2020.10.0"></a>
## 2020.10.0 (2021-02-05)

### Changed

- 🔧 Configures PhpRedis and sets it to be used for caching [[345c3b8](https://github.com/skyunlimitedinc/acs/commit/345c3b8d9cd1ee1e8806ba1ea9cd126f44e903ed)]
- ⚡ Adds caching to the `ProductController` [[043ad74](https://github.com/skyunlimitedinc/acs/commit/043ad74d9c511e5ddf3fe36f678374e8d9ad33b2)]
- 🔧 Fixes PhpStorm's list of databases [[351197a](https://github.com/skyunlimitedinc/acs/commit/351197a4b44e40c86d9f3bdfc00803bed5258dfe)]
- 🎨 Prettifies `ProductController` [[e6f41d2](https://github.com/skyunlimitedinc/acs/commit/e6f41d207de47e353a5c6886995308f1a260efae)]
- ⚡ Adds caching to the `ClipartController` [[c2b7d10](https://github.com/skyunlimitedinc/acs/commit/c2b7d10b2b457926e714452db44d49c13ed2fc81)]
- 🔧 Configure Prettier [[3946315](https://github.com/skyunlimitedinc/acs/commit/39463150a5c83f36a78c3d89ac6222399dafb408)]

### Miscellaneous

-  :adhesive_bandage: Let the Docker image use Composer 2 [[2804089](https://github.com/skyunlimitedinc/acs/commit/28040892b6be18a1d09da2fec9c1642d09290ef5)]


<a name="2020.9.2"></a>
## 2020.9.2 (2021-02-03)

### Added

- ➕ Replaces deprecated faker library with FakerPHP [[b72834a](https://github.com/skyunlimitedinc/acs/commit/b72834afc3602383afb7a2d082fd8402affd11db)]

### Changed

- 👽 Replaces sample factory with new L8 version [[3ee5bdd](https://github.com/skyunlimitedinc/acs/commit/3ee5bddf2cd134707d759ad9ed514398ddc9639d)]
- 👽 Namespaces factories and seeders [[89e6f17](https://github.com/skyunlimitedinc/acs/commit/89e6f171cd4b472b0e6660068e30957f0a6f0fb1)]
- ⬆️ Updates to Laravel 8.0 [[fb609ee](https://github.com/skyunlimitedinc/acs/commit/fb609ee1c8d2da3c30aaedc509d54a23680dd6c0)]
- ⬆️ Updates a couple of composer dependencies [[93126e9](https://github.com/skyunlimitedinc/acs/commit/93126e92e0dab2187fa15fcea395310df94c8f01)]


<a name="2020.9.1"></a>
## 2020.9.1 (2021-01-29)

### Changed

- ⬆️ Updates to Laravel 7.0 [[bbdd2a2](https://github.com/skyunlimitedinc/acs/commit/bbdd2a21fed997ab05ff5f09e0b4df6a962a61f4)]

### Fixed

- 💚 Removes the Composer downgrade from CI [[596bebf](https://github.com/skyunlimitedinc/acs/commit/596bebf7124a1c14abf4db281da2a07b9b2aad8d)]
- 💚 Sets Travis to use Composer v1 [[347f7eb](https://github.com/skyunlimitedinc/acs/commit/347f7eb2ff0409b42c0f7a48099e8ff1ba81bdc9)]
- 💚 Fixes PHP version number for Travis [[4172f31](https://github.com/skyunlimitedinc/acs/commit/4172f31be7ae7c1c3a6d9a8783525083efaeb0d2)]


<a name="2020.9.0"></a>
## 2020.9.0 (2021-01-29)

### Changed

- ⬆️ Updates to Laravel 6.0 [[eef5933](https://github.com/skyunlimitedinc/acs/commit/eef5933653ad57e594e2df873f23e2b0d90056cc)]
- ⬆️ Updates Composer dependencies for Laravel 5.8 [[51badae](https://github.com/skyunlimitedinc/acs/commit/51badae9c9ebce969a399f683bf4e175a469bce5)]
- 🔧 Configures PhpStorm to behave better [[772a24b](https://github.com/skyunlimitedinc/acs/commit/772a24b92b755a1d3c295dd992aac208f5fdec36)]
- 🔧 JetBrains config files updated [skip ci] [[39d53e4](https://github.com/skyunlimitedinc/acs/commit/39d53e4a37834e14ba9ae4bf52ecd67f1983340d)]

### Removed

- 🔥 Removes old and unnecessary dev scripts [[a7c4f46](https://github.com/skyunlimitedinc/acs/commit/a7c4f467cb7f4ab6e1cadd0637b3d1496b867906)]

### Miscellaneous

- 🔨 Adds two config files that were left behind [[4931d12](https://github.com/skyunlimitedinc/acs/commit/4931d12764000988bbcef92220ef5196ec8969f6)]
- 🔨 Runs the PhpStorm IDE Helper [[c14dfb7](https://github.com/skyunlimitedinc/acs/commit/c14dfb770264a2f578c565bf54ba595ca69bd42f)]
- 🔨 Updates Docker build script and tweaks port numbers [[6131a3e](https://github.com/skyunlimitedinc/acs/commit/6131a3e07e120e9790dccbcab54d84af8a95dbb8)]
- 🔨 Adds project info to `package.json` [[893e1b4](https://github.com/skyunlimitedinc/acs/commit/893e1b4b33078ce4d6d06c203e2500125eaceeb6)]
- 🙈 Updates .gitignore to modern settings [skip ci] [[e6fc1b6](https://github.com/skyunlimitedinc/acs/commit/e6fc1b6ed21a0c201f262a530b20908da6ee7eb1)]

<a name="The Before Times"></a>
## The Before Times

-  README fix [[1c8a524](https://github.com/skyunlimitedinc/acs/commit/1c8a524617ef74783c18039100c596f94e871d75)]
-  README Build Status [[76e5f07](https://github.com/skyunlimitedinc/acs/commit/76e5f071813a1b723cbb0f720fcdd1bfdd1a3105)]
-  .env.travis.enc [[8057aee](https://github.com/skyunlimitedinc/acs/commit/8057aeeb6023c72ddfb9ed4c7a8173a7f1dde893)]
-  Travis [[1d7c90f](https://github.com/skyunlimitedinc/acs/commit/1d7c90fcc77bb44b75724addc29a86a213f81de4)]
-  Merge branch 'master' of github.com:SturmB/acs [[53a379b](https://github.com/skyunlimitedinc/acs/commit/53a379bff895bac04982d68f54caf3f2f3e5e001)]
-  Layout Image [[2590618](https://github.com/skyunlimitedinc/acs/commit/259061877dd84d68da70323d991541af6f05c2f9)]
-  Layout Image [[241873b](https://github.com/skyunlimitedinc/acs/commit/241873b8aa28a1adce63263f9e0565ed60fbcd28)]
-  August 2020 Fixes [[73bde98](https://github.com/skyunlimitedinc/acs/commit/73bde984f641c216822cc1232760fb0132b6e1c5)]
-  Images [[da372d0](https://github.com/skyunlimitedinc/acs/commit/da372d001d1b717dce7b9000185edbe59c8bf3c6)]
-  Include Images [[0701e7e](https://github.com/skyunlimitedinc/acs/commit/0701e7e3315a9c57ea8764ebb7ad09851f2c4656)]
-  Merge branch 'dockerize' [[f49aa38](https://github.com/skyunlimitedinc/acs/commit/f49aa38eb5cf30d4563d0918d74cfeca27aa24bd)]
-  Workspace [[f4ac6a3](https://github.com/skyunlimitedinc/acs/commit/f4ac6a39e76af8c909c11beb76b99220c5a3f57e)]
-  Backend ACS Name [[bdb16e0](https://github.com/skyunlimitedinc/acs/commit/bdb16e038b12a3ca65229eb30d979286f8a86ab7)]
-  HAProxy [[03e8c27](https://github.com/skyunlimitedinc/acs/commit/03e8c27efcfaa3f2c99784936becba4e66d43439)]
-  Workspace [[a35c7b0](https://github.com/skyunlimitedinc/acs/commit/a35c7b03981dc8e106afba1fd1adda69c0837967)]
-  Sort Thumbnails [[f967d22](https://github.com/skyunlimitedinc/acs/commit/f967d22ac15da1da189ce10b7522365ccd1f1442)]
-  Initial dockerized version [[09ab4a8](https://github.com/skyunlimitedinc/acs/commit/09ab4a8feb538dbf5a523a035be6cb4dddd78de0)]
-  JetBrains Configs [[e0f97a7](https://github.com/skyunlimitedinc/acs/commit/e0f97a7e98f84394282aaf1a632cfbbd4094b269)]
-  Spec -> Random [[e7275e8](https://github.com/skyunlimitedinc/acs/commit/e7275e89784f39d2e132d430e1a207ee8d87c6e9)]
-  Merge remote-tracking branch 'origin/master' [[b713d1a](https://github.com/skyunlimitedinc/acs/commit/b713d1af81a27d02f9aee2e2e31d4be36bee2275)]
-  Prioritize Products [[76f2e73](https://github.com/skyunlimitedinc/acs/commit/76f2e73c355bde93b0cb84453f20cb933889c578)]
-  Prioritize Products [[ddbfcf4](https://github.com/skyunlimitedinc/acs/commit/ddbfcf498dc64e04d8bee9ce3ed41a94d6959d1b)]
-  Updates Page Background [[b9f88c4](https://github.com/skyunlimitedinc/acs/commit/b9f88c4b9356054736c97032bb9e7efeef738fbf)]
-  Jumbotron [[2efd995](https://github.com/skyunlimitedinc/acs/commit/2efd99500ad844d498d09a45546766aec359e2d8)]
-  Cleanup and Splash Images [[6f0c149](https://github.com/skyunlimitedinc/acs/commit/6f0c14997a0590dfc545c615692048d159875037)]
-  Removes Route Closure [[beec580](https://github.com/skyunlimitedinc/acs/commit/beec580392a5a28160bc572f0cede14805366092)]
-  Hopefully Merging Submodule [[ce22cd5](https://github.com/skyunlimitedinc/acs/commit/ce22cd54270cef9816df8fc306042f3433715b7b)]
-  .gitignore fix [[ff6cc39](https://github.com/skyunlimitedinc/acs/commit/ff6cc39114c34a55406a065481fee41ef5a0b06f)]
-  Updated for 2020! [[d4bbab1](https://github.com/skyunlimitedinc/acs/commit/d4bbab1bf0c041a65b1c024c036905acbcfe14eb)]
-  Fixing up [[8d79fac](https://github.com/skyunlimitedinc/acs/commit/8d79faca701faeaf6616dd389ee2cde64e3afcf2)]
-  Double Ugh [[e390ec8](https://github.com/skyunlimitedinc/acs/commit/e390ec80e7060c8c2ba06dc4288cbb382c476a72)]
-  And a top-level commit [[2d313f7](https://github.com/skyunlimitedinc/acs/commit/2d313f713670913818474ba44bc21c5ee9aabf15)]
-  Submodule Commit? [[70793f0](https://github.com/skyunlimitedinc/acs/commit/70793f0c5f59a710add1393da0a66af4433671d9)]
-  Testing WSLGit, Part Deux [[59a02b5](https://github.com/skyunlimitedinc/acs/commit/59a02b53d5905ca2a2f8cb377fbf7a793d098de8)]
-  Testing WSLGit [[6aa1fdb](https://github.com/skyunlimitedinc/acs/commit/6aa1fdb7f459a599068ef02673ac64c81bdcba77)]
-  server.php from PhpStorm [[eb66100](https://github.com/skyunlimitedinc/acs/commit/eb661002effceec62b256884d7603a91fa4ddded)]
-  server.php [[255307f](https://github.com/skyunlimitedinc/acs/commit/255307f167f1f2061926184852bee8fd044da7c1)]
-  Subhead [[be218aa](https://github.com/skyunlimitedinc/acs/commit/be218aa8508454c114da116734a54c26d97abd17)]
-  2019 Products [[0e6cc4e](https://github.com/skyunlimitedinc/acs/commit/0e6cc4e9884e546ee47ebe9673c8fe1980e29849)]
-  Package Updates [[b530b49](https://github.com/skyunlimitedinc/acs/commit/b530b4929040aa62a5e1e7eca02719aec0ad17e0)]
-  Minor Deployer Adjustment [[fa28e1e](https://github.com/skyunlimitedinc/acs/commit/fa28e1e308b65f878a9dde28b86edf7bfe452d57)]
-  Prettier Deployer [[6f35795](https://github.com/skyunlimitedinc/acs/commit/6f35795182f917b504f5bfb639e21a522863af7f)]
-  Laravel 5.8 [[a3fc2da](https://github.com/skyunlimitedinc/acs/commit/a3fc2da278bea9c47b82aa4a375a9d68279fee63)]
-  Laravel 5.8 [[e5177f9](https://github.com/skyunlimitedinc/acs/commit/e5177f9d8201c92e1646c8ec8c733974e0df2c5a)]
-  Quick Composer Update [[60ec477](https://github.com/skyunlimitedinc/acs/commit/60ec4770097d371ab14da0cf58a0b9c74fbf8803)]
-  April 2019 Package Updates [[87e4732](https://github.com/skyunlimitedinc/acs/commit/87e4732583d81865911383555de4b5e6f62cf5b0)]
-  Cleanup task renamed to Post-Deploy. [[1dca3e2](https://github.com/skyunlimitedinc/acs/commit/1dca3e211fc079d54db61a63d610947d79683831)]
-  ARGH [[e51e3ff](https://github.com/skyunlimitedinc/acs/commit/e51e3ffb940ee5f1d870d21a672dd9ba0ef6d370)]
-  Updates order form and its filename + the catalog's filename. [[52fa772](https://github.com/skyunlimitedinc/acs/commit/52fa772d15f46fcbf7441f934b781acc6d16a5e2)]
-  Removes Fontawesome 5.2.0. [[26c0a9f](https://github.com/skyunlimitedinc/acs/commit/26c0a9ff9453e9a3b340a5c211a0f53a826a06d8)]
-  New Branch - laravel57 [[28a5f62](https://github.com/skyunlimitedinc/acs/commit/28a5f6216e046e263557d2609cce3b8e9e4a4a2f)]
-  Bug Fixes and Features [[0cc1e75](https://github.com/skyunlimitedinc/acs/commit/0cc1e755d7c2b0e5e13288f92c8631914c0829f0)]
-  Package updates [[63c6795](https://github.com/skyunlimitedinc/acs/commit/63c67951f465b1618004adc5213fe77586125a5a)]
-  Updates `deploy.php` to include copying over the fixed Voyager files. [[4b97e43](https://github.com/skyunlimitedinc/acs/commit/4b97e439b3e25cac5fe8fbe41c995cb97ce78125)]
-  Reset, but with Deployment Adjustment. [[fbd5626](https://github.com/skyunlimitedinc/acs/commit/fbd56266d020a0e2acf3c0561eb8576cc8d17f6f)]
-  Privatizing [[84b1077](https://github.com/skyunlimitedinc/acs/commit/84b107725cdb1c2c60daa84ab63071f6f7e4c639)]
-  Storage Links Update, part 6 [[3aeb907](https://github.com/skyunlimitedinc/acs/commit/3aeb9070e2be0016504f01c8e8afcd3b662af1d2)]
-  Storage Links Update, part 5 [[1f7e757](https://github.com/skyunlimitedinc/acs/commit/1f7e75706f042520073173d22e9418e6144146a7)]
-  Storage Links Update, part 4a [[d695bd6](https://github.com/skyunlimitedinc/acs/commit/d695bd6a4c963ae34df756c5bc110b7d7dc5e474)]
-  Storage Links Update, part 4 [[da45db7](https://github.com/skyunlimitedinc/acs/commit/da45db7b97b1794a8ccf54ffbc61ec525a365e59)]
-  Storage Links Update, part 3 [[c9fff5b](https://github.com/skyunlimitedinc/acs/commit/c9fff5b478fc2894c9689fd68e4be9ccabea64ca)]
-  Storage Links Update, part 2 [[74a7c90](https://github.com/skyunlimitedinc/acs/commit/74a7c90fb63a440494d08e798ccf844bc2d138cb)]
-  Storage Links Update [[434d166](https://github.com/skyunlimitedinc/acs/commit/434d166769147c7687a7fd8bc57224363e37bd14)]
-  Cross-Browser Check [[aa62fb5](https://github.com/skyunlimitedinc/acs/commit/aa62fb5770d5bafb657f169f98a466d111d3fafd)]
-  Contact Page Complete [[8a204a0](https://github.com/skyunlimitedinc/acs/commit/8a204a07252936e439e98c284aee34b1cd59f14a)]
-  About Page Complete [[2f75197](https://github.com/skyunlimitedinc/acs/commit/2f75197c59057a8419d7b482129a466643e425dd)]
-  General Information Page Complete [[b85caad](https://github.com/skyunlimitedinc/acs/commit/b85caad5f5d3492584b15baa08ea183ecf3a0a25)]
-  Typefaces Complete [[c68c5d8](https://github.com/skyunlimitedinc/acs/commit/c68c5d841a32d5a7bfe1db7bd1312c909ed826d6)]
-  Clipart Complete [[679086b](https://github.com/skyunlimitedinc/acs/commit/679086b22b960881f3ff2bb8a4316f0feed2af5d)]
-  Product Page Complete! [[73f21c7](https://github.com/skyunlimitedinc/acs/commit/73f21c72a706d29e14d1c794b35047225e371adc)]
-  Imprint Color Choices Complete [[7a534df](https://github.com/skyunlimitedinc/acs/commit/7a534dfe75f732c9bc9f83a891d8bccb10dea6e8)]
-  Imprint Color Choices Started [[2e75d23](https://github.com/skyunlimitedinc/acs/commit/2e75d236d953ee5536349c3eb4f2514443240521)]
-  Product Color Choices Complete [[962f487](https://github.com/skyunlimitedinc/acs/commit/962f487f18d8ce28ae6dad64c19e6d3098d24a0d)]
-  Product Cards Complete [[68bbc1d](https://github.com/skyunlimitedinc/acs/commit/68bbc1df71b0701db8b8ecf19f3764ce73db6cca)]
-  Responsive Text [[e31a0f6](https://github.com/skyunlimitedinc/acs/commit/e31a0f621395ce298377b76ddd9c48efc09f7aec)]
-  Print Method Features [[9eafe08](https://github.com/skyunlimitedinc/acs/commit/9eafe0819141fe5b7934c0a25ee31acf54003ee4)]
-  Product Cards [[19f6f28](https://github.com/skyunlimitedinc/acs/commit/19f6f2805ffb4750c1ea9d28c9d488b5c345bfcf)]
-  Dependency Update [[b98e7bf](https://github.com/skyunlimitedinc/acs/commit/b98e7bf971a04aa3ae2fb9867c2334cb16ddb447)]
-  RetinaJS in CSS [[544f0c1](https://github.com/skyunlimitedinc/acs/commit/544f0c1a0e610543b70d37acd1b69f3320dc662a)]
-  Infinite Rotator [[f46f2de](https://github.com/skyunlimitedinc/acs/commit/f46f2deddd338a7928a70c00c36b0a2ef2cb0414)]
-  Infinite Rotator [[c41292b](https://github.com/skyunlimitedinc/acs/commit/c41292b5e40166fb05a35a0a95fa1f25a079ea6c)]
-  A commit [[d7e9052](https://github.com/skyunlimitedinc/acs/commit/d7e90525ff888e93c6e136d8077330fb405c7eef)]
-  Pricing Structure [[ccc42e6](https://github.com/skyunlimitedinc/acs/commit/ccc42e696c2922d9d1a0bac47e5eb0ccc98ed989)]
-  Charges [[aad1577](https://github.com/skyunlimitedinc/acs/commit/aad1577799cf76dfed755d8a4d8d9ebdd5f8328e)]
-  Prices [[7cd4f7e](https://github.com/skyunlimitedinc/acs/commit/7cd4f7e286768ccf1d960a48d3eae8af06d83f80)]
-  Product Cards [[52f7675](https://github.com/skyunlimitedinc/acs/commit/52f76757868841b0ac8f76bd5eefe292c5d65c0d)]
-  Colors, Part Deux [[b28c7aa](https://github.com/skyunlimitedinc/acs/commit/b28c7aa889184852dad88d250a166c56f1522df6)]
-  Colors [[8b7e7cf](https://github.com/skyunlimitedinc/acs/commit/8b7e7cf2b5b9337c6bd96fb299f441474afa09f6)]
-  Color Type [[ca81849](https://github.com/skyunlimitedinc/acs/commit/ca8184953f9e5fd1460d41f4e708577c2c6390af)]
-  Products, part 1 [[611de8c](https://github.com/skyunlimitedinc/acs/commit/611de8c6ff936594c68354ce4f153ca1a7457f87)]
-  Product Splash Image [[f80697b](https://github.com/skyunlimitedinc/acs/commit/f80697b490913c5286a2d78b49a48157b6def80b)]
-  Cleanup [[95ed56b](https://github.com/skyunlimitedinc/acs/commit/95ed56bac773758bd5aac187cc02e4a72b97dc42)]
-  Product Notes [[c966961](https://github.com/skyunlimitedinc/acs/commit/c9669614cb68eab93615860f8c4dfb54fe30e225)]
-  Un-migrated Migration [[ad6b574](https://github.com/skyunlimitedinc/acs/commit/ad6b574d46dbd41fb76c07be2a5f3293132647c4)]
-  Minor Adjustments [[4122e32](https://github.com/skyunlimitedinc/acs/commit/4122e32364f823d8717246d53c3783c1cea377a8)]
-  FontAwesome 5.1.0 [[737d0d9](https://github.com/skyunlimitedinc/acs/commit/737d0d995ed8008cb186d083fadbb4f1ac3d9d75)]
-  Updates to July 2018 [[7dab1d9](https://github.com/skyunlimitedinc/acs/commit/7dab1d9bbfd64e722019566cdf01e6427f537d22)]
-  Good-bye, npm. Hello, yarn. [[fb8dcab](https://github.com/skyunlimitedinc/acs/commit/fb8dcab22c6e5f826eecee702f9f1bbd92c10fc0)]
-  PHP 7.2 and Cleanup [[d1f28c5](https://github.com/skyunlimitedinc/acs/commit/d1f28c57cdca01a4ef63e337100d7aca90fc69e3)]
-  Returning Prep [[a098210](https://github.com/skyunlimitedinc/acs/commit/a098210f1da56d5da66dc43ad430f7a71aa3b462)]
-  Text Notes Prep [[58323ef](https://github.com/skyunlimitedinc/acs/commit/58323efcaf7a16c23b6b895282ad1814d3860927)]
-  Features & Options [[ac68f20](https://github.com/skyunlimitedinc/acs/commit/ac68f20dfae1aa29d67829586c13916a0715794e)]
-  Finalizing Navbar and Home Page [[0ab1dcb](https://github.com/skyunlimitedinc/acs/commit/0ab1dcb3b20c4499ae262aecec5425d6d95704f5)]
-  Changing the Navbar, part 1 [[8cb1bfb](https://github.com/skyunlimitedinc/acs/commit/8cb1bfbbbc4d175581953a471e3af1835c636a38)]
-  Removing Vue.js (for now, anyway)# [[8705a6c](https://github.com/skyunlimitedinc/acs/commit/8705a6c2b8e79c1e770f89957a61f679ea11c80c)]
-  .gitignore fix [[f1d9f81](https://github.com/skyunlimitedinc/acs/commit/f1d9f81c0642fd0295eef4cfbce1e595496d3d17)]
-  Pre-.gitignore fix [[d6ec8b6](https://github.com/skyunlimitedinc/acs/commit/d6ec8b6404083d0c6cff0e60744e54e570121a2f)]
-  Vue.js Integration [[51a32f8](https://github.com/skyunlimitedinc/acs/commit/51a32f882a24a5e03b42605af0bf44a03faed275)]
-  Product Page Started [[4ba4f81](https://github.com/skyunlimitedinc/acs/commit/4ba4f81fa82d883fbf38b5ebcc1f79c8ca10ca7f)]
-  Navbar View Composer [[d32430a](https://github.com/skyunlimitedinc/acs/commit/d32430a3731a95031cd0febfcef997895d5adde6)]
-  Home Page Complete! [[8330681](https://github.com/skyunlimitedinc/acs/commit/8330681b795736f124329bee724016488a001c7a)]
-  Sidebar Complete [[07cf469](https://github.com/skyunlimitedinc/acs/commit/07cf469406dea6c54074ae17af2ebc1bedcdc4d4)]
-  Product Category Complete (Mostly) [[6c45d63](https://github.com/skyunlimitedinc/acs/commit/6c45d63a5688f83bd3d373d745647b8014d051d1)]
-  Product Category Buttons [[d0eb08f](https://github.com/skyunlimitedinc/acs/commit/d0eb08f83b90a01ccf3764edba0ebce70965b391)]
-  Jumbotron Complete [[37264df](https://github.com/skyunlimitedinc/acs/commit/37264df29526007b0e21b1562691c674fa9d213a)]
-  Navbar Built [[51ecc7c](https://github.com/skyunlimitedinc/acs/commit/51ecc7c49a9e2da4eed5a7c48edfefa7b9442ba2)]
-  Further Database Updates/Additions [[8a48d23](https://github.com/skyunlimitedinc/acs/commit/8a48d23bab7ea70d05a933f3e93161bb84973053)]
-  Re-creation Without Composites [[90d63c6](https://github.com/skyunlimitedinc/acs/commit/90d63c6b4b1103fbb072fffa4416cb4797ef0134)]
-  Going Back [[d7560a3](https://github.com/skyunlimitedinc/acs/commit/d7560a3395219c214e01df2f27b1c51e0425cc3c)]
-  Database Creation, Part 1 [[f3119d0](https://github.com/skyunlimitedinc/acs/commit/f3119d082928b8f2106eccd218afaf2d704a35be)]
-  Company Logo [[27bed6a](https://github.com/skyunlimitedinc/acs/commit/27bed6a4160472a1d0e5bf125e83652f309a3db2)]
-  Voyager [[29a6ed3](https://github.com/skyunlimitedinc/acs/commit/29a6ed389813e6b90ae1e2dd50bfa7dbf4088ddb)]
-  Laravel IDE Helper & DBAL [[a5c8dba](https://github.com/skyunlimitedinc/acs/commit/a5c8dba86ca5d1811a39204c1275440529183155)]
-  License & Readme [[6020609](https://github.com/skyunlimitedinc/acs/commit/6020609721a700a0d51fefdb2c57cac05c031907)]
-  Initial commit [[b70abcb](https://github.com/skyunlimitedinc/acs/commit/b70abcb9711e6dda44ad42ff3c135fd68d31fc53)]


