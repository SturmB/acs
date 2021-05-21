# Changelog

<a name="2020.11.3"></a>
## 2020.11.3 (2021-05-21)

### Added

- ➕ Adds EXIF PHP module to Docker image [[d81e57f](https://github.com/skyunlimitedinc/acs/commit/d81e57fd8b27126c996bc8ce850d213c459850aa)]

### Changed

- 🔧 Adds a data source to PhpStorm [[f8a6a13](https://github.com/skyunlimitedinc/acs/commit/f8a6a13e1df7ffe720362e3566e8252b74d95f4d)]

### Removed

- 🔥 Removes now-unnecessary Travis deploy script [[94d5586](https://github.com/skyunlimitedinc/acs/commit/94d5586ca4e68cf7a52fe41f4f30fb435bf566af)]

### Fixed

- 💚 Fixes environment files [[2205de8](https://github.com/skyunlimitedinc/acs/commit/2205de87cb123efda9cc8f60c2105920b39b6b6d)]


<a name="2020.11.2"></a>
## 2020.11.2 (2021-04-14)

### Fixed

- 💚 Removes `--chown` argument during rsync [[3a976a8](https://github.com/skyunlimitedinc/acs/commit/3a976a879f407f818cc6aebd914de75b3d59665b)]

### Miscellaneous

- 👷 Changes user for CI [[b7e1f62](https://github.com/skyunlimitedinc/acs/commit/b7e1f62a2c22d83a5c271a3e0b18a98b9defa538)]
- 🔨 PhpStorm's `Project_Default.xml` file updated [[f6c9ccc](https://github.com/skyunlimitedinc/acs/commit/f6c9ccc935121d638917efef6bc1a6fc5e2abe40)]


<a name="2020.11.1"></a>
## 2020.11.1 (2021-04-09)

### Changed

- ⬆️ Updates `ssh-deploy` to v2.1.6 [[513868e](https://github.com/skyunlimitedinc/acs/commit/513868e7a02ad314e145ca58ea5e70e49e91af77)]

### Fixed

- 🐛 Fixes caching the clip art subcategories [[d1096be](https://github.com/skyunlimitedinc/acs/commit/d1096be7116cdf47f7a2d0acb9140a7355bf3c7c)]


<a name="2020.11.0"></a>
## 2020.11.0 (2021-03-01)

### Removed

- 🔥 Removes Travis files [[2b9b755](https://github.com/skyunlimitedinc/acs/commit/2b9b7557ac7437cfd37f87b5252b218b7e97c20a)]

### Miscellaneous

- 👷 Changes CI trigger to `main` branch only [[90ee3dd](https://github.com/skyunlimitedinc/acs/commit/90ee3dd1ff1a349417ac17d0dd7d41efdf95ec62)]
- 👷 Moves to using GitHub Actions for CI/CD [[89dedf1](https://github.com/skyunlimitedinc/acs/commit/89dedf102f6bbaef8817ada80996cb14791b7720)]
- 🙈 Only ignores `.env` files in the root directory [[9cad616](https://github.com/skyunlimitedinc/acs/commit/9cad61676699134c67ba6675e87be172cfbbc97c)]


<a name="2020.10.6"></a>
## 2020.10.6 (2021-02-17)

### Changed

- 🔧 Uses the latest MySQL for the db [[1916fab](https://github.com/skyunlimitedinc/acs/commit/1916fab373c1d53dc5ab952ea60c90cda8fc6d90)]

### Miscellaneous

- 📦 Compiles dev files [[189dbf7](https://github.com/skyunlimitedinc/acs/commit/189dbf7ea18df7422223782fb71999b8b06e169b)]
- 🙈 Stops committing sensitive files [[a7a3d44](https://github.com/skyunlimitedinc/acs/commit/a7a3d4493698c1bf07ff14f24da764e90307583e)]


<a name="2020.10.5"></a>
## 2020.10.5 (2021-02-15)

### Fixed

- 💚 Updates exclusions during rsync [[983a5d6](https://github.com/skyunlimitedinc/acs/commit/983a5d696922867552337f4a24d975f851aa5deb)]


<a name="2020.10.4"></a>
## 2020.10.4 (2021-02-12)

### Changed

- ⏪ Excludes `.env` file from rsync again [[759e112](https://github.com/skyunlimitedinc/acs/commit/759e1126efcae0dc2d82c63df9c2afedefd35429)]


<a name="2020.10.3"></a>
## 2020.10.3 (2021-02-12)

### Fixed

- 💚 Fixes `.env` using Redis and hopefully file cache deletion [[e81a25b](https://github.com/skyunlimitedinc/acs/commit/e81a25be87be7b4a97fc9c4d07cc91e10bb066ee)]
- 💚 Band-aid fix for the deletion problems during deployment [[31a57f6](https://github.com/skyunlimitedinc/acs/commit/31a57f647c7d6c67a1a3d026f4a749f46184dfdc)]
- 💚 Hope to fix deletion problems during deployment [[426235e](https://github.com/skyunlimitedinc/acs/commit/426235e227ce065e3ab01f87b9cc1b2d98e66313)]


<a name="2020.10.2"></a>
## 2020.10.2 (2021-02-12)

### Added

- 👷‍♂️ Save some time during artisan commands [[71afd73](https://github.com/skyunlimitedinc/acs/commit/71afd73eddfd4e0784a324e6a8ea23824d303c8e)]
- 👷‍♂️ Set deployment to run from two branches [[3741cad](https://github.com/skyunlimitedinc/acs/commit/3741cad40b316604db47acc6dbfa545843e0f840)]

### Changed

- 🔧 Updates encodec environment file with Redis info [[a440db2](https://github.com/skyunlimitedinc/acs/commit/a440db2e59af871754ff2b8abf5730296780fb29)]
- 🚨 Lints the deployment shell script [[eab0b48](https://github.com/skyunlimitedinc/acs/commit/eab0b480c4803eb650c7441f6ab8155c8198b9ab)]

### Fixed

- 🐛 Updates encoded environment file with Redis info [[fddae89](https://github.com/skyunlimitedinc/acs/commit/fddae89344115063dd265b294c478f9f61575323)]
- 💚 Sets environment file to use redis for caching [[244993e](https://github.com/skyunlimitedinc/acs/commit/244993ea5141249e68820c1b88647550ebe189d8)]


<a name="2020.10.1"></a>
## 2020.10.1 (2021-02-05)

### Miscellaneous

- 🚧 Possibly accept two branches for deployment [[10ab0b8](https://github.com/skyunlimitedinc/acs/commit/10ab0b88457f802b323f8331696884b4ffdfdf48)]
- 🔨 Updates the docker compose file to the 'master' version [[be60607](https://github.com/skyunlimitedinc/acs/commit/be60607990729361fd68218a886acc9d72d288cb)]


<a name="2020.10.0"></a>
## 2020.10.0 (2021-02-05)

### Changed

- 🔧 Configures PhpRedis and sets it to be used for caching [[0c24701](https://github.com/skyunlimitedinc/acs/commit/0c2470183e1e4fed706778d58abfa2b5f4fa8445)]
- ⚡ Adds caching to the `ProductController` [[3fdd860](https://github.com/skyunlimitedinc/acs/commit/3fdd8600a0f304e835a09cf1be3c4f466ecd4497)]
- 🔧 Fixes PhpStorm's list of databases [[2b9af2d](https://github.com/skyunlimitedinc/acs/commit/2b9af2d855c7b869300f6d874b6a71b66e37e17f)]
- 🎨 Prettifies `ProductController` [[f4d4a62](https://github.com/skyunlimitedinc/acs/commit/f4d4a62de43b126c33fac8a3c65b577e328275a9)]
- ⚡ Adds caching to the `ClipartController` [[3be78b5](https://github.com/skyunlimitedinc/acs/commit/3be78b5722bb77aaa1219911d794f4a05a3ab961)]
- 🔧 Configure Prettier [[787debe](https://github.com/skyunlimitedinc/acs/commit/787debe41b977adae107170cee5b23e562646e89)]

### Miscellaneous

- :adhesive_bandage: Let the Docker image use Composer 2 [[63ac76e](https://github.com/skyunlimitedinc/acs/commit/63ac76e0909228b69386aaca7a112b0326a2e733)]


<a name="2020.9.2"></a>
## 2020.9.2 (2021-02-03)

### Added

- ➕ Replaces deprecated faker library with FakerPHP [[a8e1af0](https://github.com/skyunlimitedinc/acs/commit/a8e1af0010bdf20db973ab463312a8b4dc22edd7)]

### Changed

- 👽 Replaces sample factory with new L8 version [[bec458f](https://github.com/skyunlimitedinc/acs/commit/bec458f9f425a5d718e912cf71de1fdf9ab37ee2)]
- 👽 Namespaces factories and seeders [[b791f97](https://github.com/skyunlimitedinc/acs/commit/b791f97fb61a34ef5e656095d63460eadc3a1872)]
- ⬆️ Updates to Laravel 8.0 [[997fdf1](https://github.com/skyunlimitedinc/acs/commit/997fdf1ce8eb4e451a8f722af6da7bcb7f0958db)]
- ⬆️ Updates a couple of composer dependencies [[931fb38](https://github.com/skyunlimitedinc/acs/commit/931fb38d46ba5884d6d36c8e5c8065fa7d643d66)]


<a name="2020.9.1"></a>
## 2020.9.1 (2021-01-29)

### Changed

- ⬆️ Updates to Laravel 7.0 [[dc8e054](https://github.com/skyunlimitedinc/acs/commit/dc8e054915ec6d67e6b2faf2bd338b0fbebef66b)]

### Fixed

- 💚 Removes the Composer downgrade from CI [[ea829f1](https://github.com/skyunlimitedinc/acs/commit/ea829f10c1c2700443ada273c586d8e08783aca4)]
- 💚 Sets Travis to use Composer v1 [[7a904cf](https://github.com/skyunlimitedinc/acs/commit/7a904cf2bdf677e52f53853fc81c88746e896a3c)]
- 💚 Fixes PHP version number for Travis [[af372ed](https://github.com/skyunlimitedinc/acs/commit/af372ed008bb256c4bc5275190cfcf66c410d888)]


<a name="2020.9.0"></a>
## 2020.9.0 (2021-01-29)

### Changed

- ⬆️ Updates to Laravel 6.0 [[f6ed719](https://github.com/skyunlimitedinc/acs/commit/f6ed719ed9526ec0247fa571557ccd493fab03fd)]
- ⬆️ Updates Composer dependencies for Laravel 5.8 [[b32dfe5](https://github.com/skyunlimitedinc/acs/commit/b32dfe57d16ea8260d65d9565ebf0872b14b7be0)]
- 🔧 Configures PhpStorm to behave better [[c75a6fb](https://github.com/skyunlimitedinc/acs/commit/c75a6fbd4534a1641d60bd959c78c4db88d7f4df)]
- 🔧 JetBrains config files updated [skip ci] [[f09f76b](https://github.com/skyunlimitedinc/acs/commit/f09f76b8aaa57c45d92269b8a87e50795652419c)]

### Removed

- 🔥 Removes old and unnecessary dev scripts [[5a478c1](https://github.com/skyunlimitedinc/acs/commit/5a478c18306f3ddb1acc82f7fe48eaf442a5e6d2)]

### Miscellaneous

- 🔨 Adds two config files that were left behind [[972eb08](https://github.com/skyunlimitedinc/acs/commit/972eb0808eb0703c0fb6d80fc8a5d928a3318b17)]
- 🔨 Runs the PhpStorm IDE Helper [[0590836](https://github.com/skyunlimitedinc/acs/commit/05908367a8a3ddb0f4cf6f7a945005dc15def981)]
- 🔨 Updates Docker build script and tweaks port numbers [[13e9c0c](https://github.com/skyunlimitedinc/acs/commit/13e9c0c63835ae45708fc9d90ae7ef6f062cfdea)]
- 🔨 Adds project info to `package.json` [[8c6bf2c](https://github.com/skyunlimitedinc/acs/commit/8c6bf2cf78c1b8950958e53b0d7a5bf791d677bd)]
- 🙈 Updates .gitignore to modern settings [skip ci] [[39b1420](https://github.com/skyunlimitedinc/acs/commit/39b1420b3001e89ad63ae8a02a0e5b1a26fed113)]

<a name="The Before Times"></a>
## The Before Times

- README fix [[e4845b1](https://github.com/skyunlimitedinc/acs/commit/e4845b13c5f6ec59a9c39332c2546203eee6a652)]
- README Build Status [[1235b6c](https://github.com/skyunlimitedinc/acs/commit/1235b6c6748e1e6276f06bb7d133b9d82f1d8d09)]
- .env.travis.enc [[2fee2f0](https://github.com/skyunlimitedinc/acs/commit/2fee2f089c2ea7b02e150add2b5787dd59aff996)]
- Travis [[b9cf0e1](https://github.com/skyunlimitedinc/acs/commit/b9cf0e17c72a584306f143d35dce6d60a4465fa4)]
- Merge branch 'master' of github.com:SturmB/acs [[73170cd](https://github.com/skyunlimitedinc/acs/commit/73170cd79ae7a4eb1c587ff8593d5a81c4e53ea6)]
- Layout Image [[d4bb153](https://github.com/skyunlimitedinc/acs/commit/d4bb1533d0ce8f969dbc2a1de432245465751269)]
- Layout Image [[eba8638](https://github.com/skyunlimitedinc/acs/commit/eba8638cd50d810b3dff0b73b478ca852bca583f)]
- August 2020 Fixes [[b27069e](https://github.com/skyunlimitedinc/acs/commit/b27069e5fdfb407de3f81b3e33bff2bc6d059949)]
- Images [[60d85f1](https://github.com/skyunlimitedinc/acs/commit/60d85f157f014cc17b28d9c494d13d279a44ce45)]
- Include Images [[8ea3ecc](https://github.com/skyunlimitedinc/acs/commit/8ea3ecce16377f2bc69fef3766e2e6cc3bfaddc7)]
- Merge branch 'dockerize' [[3276a79](https://github.com/skyunlimitedinc/acs/commit/3276a79894b1b8b2c1725a7043a13e1301eb7744)]
- Workspace [[f4ac6a3](https://github.com/skyunlimitedinc/acs/commit/f4ac6a39e76af8c909c11beb76b99220c5a3f57e)]
- Backend ACS Name [[d7a4d17](https://github.com/skyunlimitedinc/acs/commit/d7a4d172bffd0603de7a1c1bad0ac7fbfb394664)]
- HAProxy [[687cd37](https://github.com/skyunlimitedinc/acs/commit/687cd37e8dc58699999005f754820aafac5e3ca2)]
- Workspace [[bc4b1b8](https://github.com/skyunlimitedinc/acs/commit/bc4b1b8c59081e1600fd12856e3e1b9d1202893f)]
- Sort Thumbnails [[a3016bf](https://github.com/skyunlimitedinc/acs/commit/a3016bf3e69fcc07c6d7f8e7f2ed6c1fb4e2d4c9)]
- Initial dockerized version [[a2cf030](https://github.com/skyunlimitedinc/acs/commit/a2cf030570ccf3a53fe343c3bc2dad67b89e07b5)]
- JetBrains Configs [[e0f97a7](https://github.com/skyunlimitedinc/acs/commit/e0f97a7e98f84394282aaf1a632cfbbd4094b269)]
- Spec -> Random [[e7275e8](https://github.com/skyunlimitedinc/acs/commit/e7275e89784f39d2e132d430e1a207ee8d87c6e9)]
- Merge remote-tracking branch 'origin/master' [[b713d1a](https://github.com/skyunlimitedinc/acs/commit/b713d1af81a27d02f9aee2e2e31d4be36bee2275)]
- Prioritize Products [[76f2e73](https://github.com/skyunlimitedinc/acs/commit/76f2e73c355bde93b0cb84453f20cb933889c578)]
- Prioritize Products [[ddbfcf4](https://github.com/skyunlimitedinc/acs/commit/ddbfcf498dc64e04d8bee9ce3ed41a94d6959d1b)]
- Updates Page Background [[b9f88c4](https://github.com/skyunlimitedinc/acs/commit/b9f88c4b9356054736c97032bb9e7efeef738fbf)]
- Jumbotron [[2efd995](https://github.com/skyunlimitedinc/acs/commit/2efd99500ad844d498d09a45546766aec359e2d8)]
- Cleanup and Splash Images [[6f0c149](https://github.com/skyunlimitedinc/acs/commit/6f0c14997a0590dfc545c615692048d159875037)]
- Removes Route Closure [[beec580](https://github.com/skyunlimitedinc/acs/commit/beec580392a5a28160bc572f0cede14805366092)]
- Hopefully Merging Submodule [[ce22cd5](https://github.com/skyunlimitedinc/acs/commit/ce22cd54270cef9816df8fc306042f3433715b7b)]
- .gitignore fix [[ff6cc39](https://github.com/skyunlimitedinc/acs/commit/ff6cc39114c34a55406a065481fee41ef5a0b06f)]
- Updated for 2020! [[d4bbab1](https://github.com/skyunlimitedinc/acs/commit/d4bbab1bf0c041a65b1c024c036905acbcfe14eb)]
- Fixing up [[8d79fac](https://github.com/skyunlimitedinc/acs/commit/8d79faca701faeaf6616dd389ee2cde64e3afcf2)]
- Double Ugh [[e390ec8](https://github.com/skyunlimitedinc/acs/commit/e390ec80e7060c8c2ba06dc4288cbb382c476a72)]
- And a top-level commit [[2d313f7](https://github.com/skyunlimitedinc/acs/commit/2d313f713670913818474ba44bc21c5ee9aabf15)]
- Submodule Commit? [[70793f0](https://github.com/skyunlimitedinc/acs/commit/70793f0c5f59a710add1393da0a66af4433671d9)]
- Testing WSLGit, Part Deux [[59a02b5](https://github.com/skyunlimitedinc/acs/commit/59a02b53d5905ca2a2f8cb377fbf7a793d098de8)]
- Testing WSLGit [[6aa1fdb](https://github.com/skyunlimitedinc/acs/commit/6aa1fdb7f459a599068ef02673ac64c81bdcba77)]
- server.php from PhpStorm [[eb66100](https://github.com/skyunlimitedinc/acs/commit/eb661002effceec62b256884d7603a91fa4ddded)]
- server.php [[255307f](https://github.com/skyunlimitedinc/acs/commit/255307f167f1f2061926184852bee8fd044da7c1)]
- Subhead [[be218aa](https://github.com/skyunlimitedinc/acs/commit/be218aa8508454c114da116734a54c26d97abd17)]
- 2019 Products [[0e6cc4e](https://github.com/skyunlimitedinc/acs/commit/0e6cc4e9884e546ee47ebe9673c8fe1980e29849)]
- Package Updates [[b530b49](https://github.com/skyunlimitedinc/acs/commit/b530b4929040aa62a5e1e7eca02719aec0ad17e0)]
- Minor Deployer Adjustment [[fa28e1e](https://github.com/skyunlimitedinc/acs/commit/fa28e1e308b65f878a9dde28b86edf7bfe452d57)]
- Prettier Deployer [[6f35795](https://github.com/skyunlimitedinc/acs/commit/6f35795182f917b504f5bfb639e21a522863af7f)]
- Laravel 5.8 [[a3fc2da](https://github.com/skyunlimitedinc/acs/commit/a3fc2da278bea9c47b82aa4a375a9d68279fee63)]
- Laravel 5.8 [[e5177f9](https://github.com/skyunlimitedinc/acs/commit/e5177f9d8201c92e1646c8ec8c733974e0df2c5a)]
- Quick Composer Update [[60ec477](https://github.com/skyunlimitedinc/acs/commit/60ec4770097d371ab14da0cf58a0b9c74fbf8803)]
- April 2019 Package Updates [[87e4732](https://github.com/skyunlimitedinc/acs/commit/87e4732583d81865911383555de4b5e6f62cf5b0)]
- Cleanup task renamed to Post-Deploy. [[1dca3e2](https://github.com/skyunlimitedinc/acs/commit/1dca3e211fc079d54db61a63d610947d79683831)]
- ARGH [[e51e3ff](https://github.com/skyunlimitedinc/acs/commit/e51e3ffb940ee5f1d870d21a672dd9ba0ef6d370)]
- Updates order form and its filename + the catalog's filename. [[52fa772](https://github.com/skyunlimitedinc/acs/commit/52fa772d15f46fcbf7441f934b781acc6d16a5e2)]
- Removes Fontawesome 5.2.0. [[26c0a9f](https://github.com/skyunlimitedinc/acs/commit/26c0a9ff9453e9a3b340a5c211a0f53a826a06d8)]
- New Branch - laravel57 [[28a5f62](https://github.com/skyunlimitedinc/acs/commit/28a5f6216e046e263557d2609cce3b8e9e4a4a2f)]
- Bug Fixes and Features [[0cc1e75](https://github.com/skyunlimitedinc/acs/commit/0cc1e755d7c2b0e5e13288f92c8631914c0829f0)]
- Package updates [[63c6795](https://github.com/skyunlimitedinc/acs/commit/63c67951f465b1618004adc5213fe77586125a5a)]
- Updates `deploy.php` to include copying over the fixed Voyager files. [[4b97e43](https://github.com/skyunlimitedinc/acs/commit/4b97e439b3e25cac5fe8fbe41c995cb97ce78125)]
- Reset, but with Deployment Adjustment. [[fbd5626](https://github.com/skyunlimitedinc/acs/commit/fbd56266d020a0e2acf3c0561eb8576cc8d17f6f)]
- Privatizing [[84b1077](https://github.com/skyunlimitedinc/acs/commit/84b107725cdb1c2c60daa84ab63071f6f7e4c639)]
- Storage Links Update, part 6 [[3aeb907](https://github.com/skyunlimitedinc/acs/commit/3aeb9070e2be0016504f01c8e8afcd3b662af1d2)]
- Storage Links Update, part 5 [[1f7e757](https://github.com/skyunlimitedinc/acs/commit/1f7e75706f042520073173d22e9418e6144146a7)]
- Storage Links Update, part 4a [[d695bd6](https://github.com/skyunlimitedinc/acs/commit/d695bd6a4c963ae34df756c5bc110b7d7dc5e474)]
- Storage Links Update, part 4 [[da45db7](https://github.com/skyunlimitedinc/acs/commit/da45db7b97b1794a8ccf54ffbc61ec525a365e59)]
- Storage Links Update, part 3 [[c9fff5b](https://github.com/skyunlimitedinc/acs/commit/c9fff5b478fc2894c9689fd68e4be9ccabea64ca)]
- Storage Links Update, part 2 [[74a7c90](https://github.com/skyunlimitedinc/acs/commit/74a7c90fb63a440494d08e798ccf844bc2d138cb)]
- Storage Links Update [[434d166](https://github.com/skyunlimitedinc/acs/commit/434d166769147c7687a7fd8bc57224363e37bd14)]
- Cross-Browser Check [[aa62fb5](https://github.com/skyunlimitedinc/acs/commit/aa62fb5770d5bafb657f169f98a466d111d3fafd)]
- Contact Page Complete [[8a204a0](https://github.com/skyunlimitedinc/acs/commit/8a204a07252936e439e98c284aee34b1cd59f14a)]
- About Page Complete [[2f75197](https://github.com/skyunlimitedinc/acs/commit/2f75197c59057a8419d7b482129a466643e425dd)]
- General Information Page Complete [[b85caad](https://github.com/skyunlimitedinc/acs/commit/b85caad5f5d3492584b15baa08ea183ecf3a0a25)]
- Typefaces Complete [[c68c5d8](https://github.com/skyunlimitedinc/acs/commit/c68c5d841a32d5a7bfe1db7bd1312c909ed826d6)]
- Clipart Complete [[679086b](https://github.com/skyunlimitedinc/acs/commit/679086b22b960881f3ff2bb8a4316f0feed2af5d)]
- Product Page Complete! [[73f21c7](https://github.com/skyunlimitedinc/acs/commit/73f21c72a706d29e14d1c794b35047225e371adc)]
- Imprint Color Choices Complete [[7a534df](https://github.com/skyunlimitedinc/acs/commit/7a534dfe75f732c9bc9f83a891d8bccb10dea6e8)]
- Imprint Color Choices Started [[2e75d23](https://github.com/skyunlimitedinc/acs/commit/2e75d236d953ee5536349c3eb4f2514443240521)]
- Product Color Choices Complete [[962f487](https://github.com/skyunlimitedinc/acs/commit/962f487f18d8ce28ae6dad64c19e6d3098d24a0d)]
- Product Cards Complete [[68bbc1d](https://github.com/skyunlimitedinc/acs/commit/68bbc1df71b0701db8b8ecf19f3764ce73db6cca)]
- Responsive Text [[e31a0f6](https://github.com/skyunlimitedinc/acs/commit/e31a0f621395ce298377b76ddd9c48efc09f7aec)]
- Print Method Features [[9eafe08](https://github.com/skyunlimitedinc/acs/commit/9eafe0819141fe5b7934c0a25ee31acf54003ee4)]
- Product Cards [[19f6f28](https://github.com/skyunlimitedinc/acs/commit/19f6f2805ffb4750c1ea9d28c9d488b5c345bfcf)]
- Dependency Update [[b98e7bf](https://github.com/skyunlimitedinc/acs/commit/b98e7bf971a04aa3ae2fb9867c2334cb16ddb447)]
- RetinaJS in CSS [[544f0c1](https://github.com/skyunlimitedinc/acs/commit/544f0c1a0e610543b70d37acd1b69f3320dc662a)]
- Infinite Rotator [[f46f2de](https://github.com/skyunlimitedinc/acs/commit/f46f2deddd338a7928a70c00c36b0a2ef2cb0414)]
- Infinite Rotator [[c41292b](https://github.com/skyunlimitedinc/acs/commit/c41292b5e40166fb05a35a0a95fa1f25a079ea6c)]
- A commit [[d7e9052](https://github.com/skyunlimitedinc/acs/commit/d7e90525ff888e93c6e136d8077330fb405c7eef)]
- Pricing Structure [[ccc42e6](https://github.com/skyunlimitedinc/acs/commit/ccc42e696c2922d9d1a0bac47e5eb0ccc98ed989)]
- Charges [[aad1577](https://github.com/skyunlimitedinc/acs/commit/aad1577799cf76dfed755d8a4d8d9ebdd5f8328e)]
- Prices [[7cd4f7e](https://github.com/skyunlimitedinc/acs/commit/7cd4f7e286768ccf1d960a48d3eae8af06d83f80)]
- Product Cards [[52f7675](https://github.com/skyunlimitedinc/acs/commit/52f76757868841b0ac8f76bd5eefe292c5d65c0d)]
- Colors, Part Deux [[b28c7aa](https://github.com/skyunlimitedinc/acs/commit/b28c7aa889184852dad88d250a166c56f1522df6)]
- Colors [[8b7e7cf](https://github.com/skyunlimitedinc/acs/commit/8b7e7cf2b5b9337c6bd96fb299f441474afa09f6)]
- Color Type [[ca81849](https://github.com/skyunlimitedinc/acs/commit/ca8184953f9e5fd1460d41f4e708577c2c6390af)]
- Products, part 1 [[611de8c](https://github.com/skyunlimitedinc/acs/commit/611de8c6ff936594c68354ce4f153ca1a7457f87)]
- Product Splash Image [[f80697b](https://github.com/skyunlimitedinc/acs/commit/f80697b490913c5286a2d78b49a48157b6def80b)]
- Cleanup [[95ed56b](https://github.com/skyunlimitedinc/acs/commit/95ed56bac773758bd5aac187cc02e4a72b97dc42)]
- Product Notes [[c966961](https://github.com/skyunlimitedinc/acs/commit/c9669614cb68eab93615860f8c4dfb54fe30e225)]
- Un-migrated Migration [[ad6b574](https://github.com/skyunlimitedinc/acs/commit/ad6b574d46dbd41fb76c07be2a5f3293132647c4)]
- Minor Adjustments [[4122e32](https://github.com/skyunlimitedinc/acs/commit/4122e32364f823d8717246d53c3783c1cea377a8)]
- FontAwesome 5.1.0 [[737d0d9](https://github.com/skyunlimitedinc/acs/commit/737d0d995ed8008cb186d083fadbb4f1ac3d9d75)]
- Updates to July 2018 [[7dab1d9](https://github.com/skyunlimitedinc/acs/commit/7dab1d9bbfd64e722019566cdf01e6427f537d22)]
- Good-bye, npm. Hello, yarn. [[fb8dcab](https://github.com/skyunlimitedinc/acs/commit/fb8dcab22c6e5f826eecee702f9f1bbd92c10fc0)]
- PHP 7.2 and Cleanup [[d1f28c5](https://github.com/skyunlimitedinc/acs/commit/d1f28c57cdca01a4ef63e337100d7aca90fc69e3)]
- Returning Prep [[a098210](https://github.com/skyunlimitedinc/acs/commit/a098210f1da56d5da66dc43ad430f7a71aa3b462)]
- Text Notes Prep [[58323ef](https://github.com/skyunlimitedinc/acs/commit/58323efcaf7a16c23b6b895282ad1814d3860927)]
- Features & Options [[ac68f20](https://github.com/skyunlimitedinc/acs/commit/ac68f20dfae1aa29d67829586c13916a0715794e)]
- Finalizing Navbar and Home Page [[0ab1dcb](https://github.com/skyunlimitedinc/acs/commit/0ab1dcb3b20c4499ae262aecec5425d6d95704f5)]
- Changing the Navbar, part 1 [[8cb1bfb](https://github.com/skyunlimitedinc/acs/commit/8cb1bfbbbc4d175581953a471e3af1835c636a38)]
- Removing Vue.js (for now, anyway)[[8705a6c](https://github.com/skyunlimitedinc/acs/commit/8705a6c2b8e79c1e770f89957a61f679ea11c80c)]
- .gitignore fix [[f1d9f81](https://github.com/skyunlimitedinc/acs/commit/f1d9f81c0642fd0295eef4cfbce1e595496d3d17)]
- Pre-.gitignore fix [[d6ec8b6](https://github.com/skyunlimitedinc/acs/commit/d6ec8b6404083d0c6cff0e60744e54e570121a2f)]
- Vue.js Integration [[51a32f8](https://github.com/skyunlimitedinc/acs/commit/51a32f882a24a5e03b42605af0bf44a03faed275)]
- Product Page Started [[4ba4f81](https://github.com/skyunlimitedinc/acs/commit/4ba4f81fa82d883fbf38b5ebcc1f79c8ca10ca7f)]
- Navbar View Composer [[d32430a](https://github.com/skyunlimitedinc/acs/commit/d32430a3731a95031cd0febfcef997895d5adde6)]
- Home Page Complete! [[8330681](https://github.com/skyunlimitedinc/acs/commit/8330681b795736f124329bee724016488a001c7a)]
- Sidebar Complete [[07cf469](https://github.com/skyunlimitedinc/acs/commit/07cf469406dea6c54074ae17af2ebc1bedcdc4d4)]
- Product Category Complete (Mostly) [[6c45d63](https://github.com/skyunlimitedinc/acs/commit/6c45d63a5688f83bd3d373d745647b8014d051d1)]
- Product Category Buttons [[d0eb08f](https://github.com/skyunlimitedinc/acs/commit/d0eb08f83b90a01ccf3764edba0ebce70965b391)]
- Jumbotron Complete [[37264df](https://github.com/skyunlimitedinc/acs/commit/37264df29526007b0e21b1562691c674fa9d213a)]
- Navbar Built [[51ecc7c](https://github.com/skyunlimitedinc/acs/commit/51ecc7c49a9e2da4eed5a7c48edfefa7b9442ba2)]
- Further Database Updates/Additions [[8a48d23](https://github.com/skyunlimitedinc/acs/commit/8a48d23bab7ea70d05a933f3e93161bb84973053)]
- Re-creation Without Composites [[90d63c6](https://github.com/skyunlimitedinc/acs/commit/90d63c6b4b1103fbb072fffa4416cb4797ef0134)]
- Going Back [[d7560a3](https://github.com/skyunlimitedinc/acs/commit/d7560a3395219c214e01df2f27b1c51e0425cc3c)]
- Database Creation, Part 1 [[f3119d0](https://github.com/skyunlimitedinc/acs/commit/f3119d082928b8f2106eccd218afaf2d704a35be)]
- Company Logo [[27bed6a](https://github.com/skyunlimitedinc/acs/commit/27bed6a4160472a1d0e5bf125e83652f309a3db2)]
- Voyager [[29a6ed3](https://github.com/skyunlimitedinc/acs/commit/29a6ed389813e6b90ae1e2dd50bfa7dbf4088ddb)]
- Laravel IDE Helper & DBAL [[a5c8dba](https://github.com/skyunlimitedinc/acs/commit/a5c8dba86ca5d1811a39204c1275440529183155)]
- License & Readme [[6020609](https://github.com/skyunlimitedinc/acs/commit/6020609721a700a0d51fefdb2c57cac05c031907)]
- Initial commit [[b70abcb](https://github.com/skyunlimitedinc/acs/commit/b70abcb9711e6dda44ad42ff3c135fd68d31fc53)]


