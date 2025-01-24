# Contributing to Base Theme

Thank you for considering contributing to Base Theme! This document outlines the process for contributing to this WordPress starter theme.

## Development Process

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Make your changes
4. Run tests and ensure coding standards are met
5. Commit your changes (`git commit -m 'Add amazing feature'`)
6. Push to your branch (`git push origin feature/amazing-feature`)
7. Open a Pull Request

## Coding Standards

-   Follow WordPress Coding Standards
-   Use ESLint for JavaScript
-   Use Prettier for code formatting
-   Follow BEM methodology for CSS
-   Write meaningful commit messages

## Project Structure

```
base-theme/
├── dist/                      # Compiled assets
│   ├── css/                  # Compiled CSS
│   └── js/                   # Compiled JavaScript
├── docs/                      # Documentation
├── inc/                       # PHP includes
│   ├── template-tags.php     # Template functions
│   └── template-functions.php # Theme functions
├── src/                       # Source files
│   ├── css/                  # Stylesheets
│   │   ├── style.css        # Main stylesheet
│   │   ├── _navigation.css  # Navigation styles
│   │   ├── _accessibility.css
│   │   └── _alignments.css
│   └── js/                   # JavaScript files
│       ├── components/       # React components
│       ├── app.js           # Main JavaScript
│       └── react-init.js    # React initialization
├── template-parts/            # Template partials
├── template-pages/            # Page templates
├── functions.php             # Theme functions
├── index.php                # Main template
├── header.php              # Header template
├── footer.php              # Footer template
└── style.css               # Theme information
```

## Development Setup

1. Install dependencies:

    ```bash
    npm install
    ```

2. Start development server:

    ```bash
    npm start
    ```

3. Watch for changes:
    ```bash
    npm run watch
    ```

## Code Style Guide

### PHP

-   Follow [WordPress PHP Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/)
-   Use proper PHPDoc comments
-   Prefix functions with `_base_`

### JavaScript

-   Use ES6+ features
-   Properly type React props

### CSS

-   Use CSS custom properties for theming
-   Mobile-first approach
-   Maintain modular structure

## Pull Request Process

1. Update documentation if needed
2. Update the README.md with any necessary changes
3. Update the version number following [SemVer](https://semver.org/)
4. The PR will be merged once you have the sign-off of at least one maintainer

## Git Commit Messages

-   Use the present tense ("Add feature" not "Added feature")
-   Use the imperative mood ("Move cursor to..." not "Moves cursor to...")
-   Limit the first line to 72 characters or less
-   Reference issues and pull requests liberally after the first line

## Additional Notes

### Documentation

-   Keep documentation up to date
-   Document all functions and components
-   Include examples where appropriate
-   Update changelog

### Testing

-   Test across different browsers
-   Ensure mobile responsiveness
-   Check accessibility compliance
-   Verify WordPress compatibility

## Questions or Problems?

-   Check existing issues
-   Open a new issue with a clear title and description
-   Provide as much relevant information as possible

## License

By contributing, you agree that your contributions will be licensed under the MIT License.
