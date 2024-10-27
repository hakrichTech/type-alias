<div id="top"></div>
<!--
*** Thanks for checking out the Type Alias Manager. If you have a suggestion
*** that would make this better, please fork the repo and create a pull request
*** or simply open an issue with the tag "enhancement".
*** Don't forget to give the project a star!
*** Thanks again! Now go create something AMAZING! :D
-->



<!-- PROJECT SHIELDS -->
<!--
*** I'm using markdown "reference style" links for readability.
*** Reference links are enclosed in brackets [ ] instead of parentheses ( ).
*** See the bottom of this document for the declaration of the reference variables
*** for contributors-url, forks-url, etc. This is an optional, concise syntax you may use.
*** https://www.markdownguide.org/basic-syntax/#reference-style-links
-->
[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]
[![LinkedIn][linkedin-shield]][linkedin-url]



<!-- PROJECT LOGO -->
<br />
<div align="center">
  <a href="https://github.com/hakrichTech/type-alias">
    <img src="images/logo.png" alt="Logo" width="80" height="80">
  </a>

  <h3 align="center">PHPShots/Common [Type Alias Manager]</h3>

  <p align="center">
    A common library for managing type aliases in PHP.
    <br />
    <a href="https://github.com/hakrichTech/type-alias"><strong>Explore the docs »</strong></a>
    <br />
    <br />
    <a href="https://github.com/hakrichTech/type-alias">View Demo</a>
    ·
    <a href="https://github.com/hakrichTech/type-alias/issues">Report Bug</a>
    ·
    <a href="https://github.com/hakrichTech/type-alias/issues">Request Feature</a>
  </p>
</div>



<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#roadmap">Roadmap</a></li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="#acknowledgments">Acknowledgments</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

<!-- [![Product Name Screen Shot][product-screenshot]](https://hkmcode.com/type-aliase) -->

This project is a PHP library designed to create and manage type aliases, making code more readable and maintainable. Type aliases can simplify complex type definitions and enhance the developer experience.

### Why Use Type Alias?
* Improves code clarity and reduces redundancy.
* Makes collaboration easier by standardizing types.
* Enhances type safety in your applications.

Feel free to explore and contribute!




### Built With

* [PHP](https://www.php.net/)
* [Composer](https://getcomposer.org/)






<!-- GETTING STARTED -->
## Getting Started

Follow these steps to set up and start using the Type Alias library in your PHP project.


### Prerequisites

Before you begin, ensure you have the following installed:

- PHP (version 8.2 or higher)
  ```sh
  apt install php
  ```
- Composer (for dependency management)
  ```sh
    apt install composer
    ```




### Installation

1. **Clone the Repository**: Start by cloning the repository to your local machine:

   ```bash
   git clone https://github.com/hakrichTech/type-alias.git
   ```
2. Navigate to the Project Directory
   ```sh
   cd type-alias
   ```
3. **Install Dependencies**: Use Composer to   install the required dependencies:
   ```sh
   composer install
   ```



## Basic Setup

1. **Include the Library**: In your PHP script, include the Composer autoload file to access the Type Alias library:

    ```php
    require 'vendor/autoload.php'; // Adjust the path as necessary
    ```

2. **Using the Type Alias Library**: Start using the library by creating type aliases. Here’s a basic example:

    ```php
    use PHPShots\Common\TypeAlias;

    // Create an instance of TypeAlias
    $typeAlias = new TypeAlias;

    // Create a type alias
    $typeAlias->alias('MyAlias', 'OriginalType');

    // Example of an original type
    class OriginalType {
        public function sayHello(string $type) {
            return "Hello from $type!";
        }
    }

    // Instantiate using the alias
    $myVariable = new MyAlias();
    echo $myVariable->sayHello($typeAlias->getAlias('MyAlias')); // Outputs: Hello from OriginalType!
    ```
  - **isAlias**: Checks if a name is already an alias.

    ```php
      // Check if a name is an alias
      if ($typeAlias->isAlias('MyAlias')) {
          echo "MyAlias is an OriginalType.\n";
      }
    ```
  - **removeAbstractAlias**: Removes a specific alias from the abstract and aliases list.

    ```php
    // Remove an alias
    $typeAlias->removeAbstractAlias('MyAlias');
    ```
  - **getAlias**: Gets the ultimate alias for an abstract type, following any alias chain.

    ```php
    // Retrieve the ultimate alias
    echo "Ultimate alias for MyAlias: " . $typeAlias->getAlias('MyAlias') . "\n";
    ```

  - **alias**: Adds an alias for an abstract type, with checks to prevent self-aliasing.
    
    ```php
    // Register some aliases
    $typeAlias->alias('SomeClass', 'Alias1');
    $typeAlias->alias('Alias1', 'Alias2'); // chaining alias
    ```

  - **aliasReverse**: Provides an alternative alias method with reversed parameter order.

    ```php
    // Register some aliases in reversed order
    $typeAlias->alias('Alias1', 'SomeClass');
    $typeAlias->alias('Alias2', 'Alias1'); // chaining alias
    ```

  - **getAllAliases**: Returns all aliases for a given abstract.
    
    ```php
    // List all aliases for a type
    print_r($typeAlias->getAllAliases('SomeClass'));
    ```
  - **clearAliases**: Clears all aliases at once.
    ```php
    // Clear all aliases
    $typeAlias->clearAliases();
    ```
  - **getAliasMap**: Returns the entire alias map for quick inspection.

    ```php
    // Display all direct mappings
    print_r($typeAlias->getAliasMap());  
    ```

  - **hasAbstract**: Checks if an abstract type has any associated aliases.

    ```php
    // Check for aliases of an abstract type
    echo $typeAlias->hasAbstract('SomeClass') ? "SomeClass has aliases.\n" : "No aliases for SomeClass.\n";

    ```

<!-- ROADMAP -->
## Roadmap

- [x] Add Changelog
- [x] Add additional features and methods
- [ ] Improve documentation
- [ ] Implement unit tests


<!-- CONTRIBUTING -->
## Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue with the tag "enhancement".
Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request




<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE.txt` for more information.


<!-- CONTACT -->
## Contact

Shamavu Rasheed - [@hakeem-shamavu](www.linkedin.com/in/hakeem-shamavu) - shamavurasheed@gmail.com

Project Link: [https://github.com/hakrichTech/type-alias](https://github.com/hakrichTech/type-alias)




<!-- ACKNOWLEDGMENTS -->
## Acknowledgments

Use this space to list resources you find helpful and would like to give credit to. I've included a few of my favorites to kick things off!

* [Choose an Open Source License](https://choosealicense.com)
* [GitHub Emoji Cheat Sheet](https://www.webpagefx.com/tools/emoji-cheat-sheet)
* [Malven's Flexbox Cheatsheet](https://flexbox.malven.co/)
* [Malven's Grid Cheatsheet](https://grid.malven.co/)
* [Img Shields](https://shields.io)
* [GitHub Pages](https://pages.github.com)
* [Font Awesome](https://fontawesome.com)
* [React Icons](https://react-icons.github.io/react-icons/search)

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/othneildrew/Best-README-Template.svg?style=for-the-badge
[contributors-url]: https://github.com/hakrichTech/type-alias/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/othneildrew/Best-README-Template.svg?style=for-the-badge
[forks-url]: https://github.com/hakrichTech/type-alias/network/members
[stars-shield]: https://img.shields.io/github/stars/othneildrew/Best-README-Template.svg?style=for-the-badge
[stars-url]: https://github.com/hakrichTech/type-alias/stargazers
[issues-shield]: https://img.shields.io/github/issues/othneildrew/Best-README-Template.svg?style=for-the-badge
[issues-url]: https://github.com/hakrichTech/type-alias/issues
[license-shield]: https://img.shields.io/github/license/othneildrew/Best-README-Template.svg?style=for-the-badge
[license-url]: https://github.com/hakrichTech/type-alias/blob/master/LICENSE.txt
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/in/hakeem-shamavu
[product-screenshot]: images/screenshot.png
