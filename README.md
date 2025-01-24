# WordPress Starter Theme with React & Tailwind v4

A modern WordPress starter theme built with webpack, Tailwind CSS, and React, designed for developers who want a clean, efficient starting point for custom WordPress development.

## Features

-   🎨 Tailwind CSS with Typography plugin
-   ⚛️ React components support
-   📦 Webpack bundling with HMR
-   🧹 Clean WordPress header optimization
-   📱 Responsive navigation
-   ♿ Accessibility-ready
-   🎯 Code splitting and optimization
-   🔍 SEO-friendly structure
-   🌐 Internationalization ready
-   🔒 Security best practices

## Requirements

-   WordPress 5.0+
-   PHP 7.4+
-   Node.js 22.6.0+
-   npm or yarn

## Installation

1. Clone this repository into your WordPress themes directory:

    ```bash
    cd wp-content/themes
    git clone https://github.com/your-username/base-theme.git ./your-theme-name
    ```

2. Install dependencies:

    ```bash
    cd your-theme-name
    npm install
    ```

3. Build assets:

    ```bash
    # Development with watch mode
    npm run watch

    # Production build
    npm run build:prod
    ```

4. Activate the theme in WordPress admin panel

## Development

### Project Structure

### Available Scripts

-   `npm start` - Start development server with HMR
-   `npm run watch` - Watch for changes and rebuild
-   `npm run build` - Development build
-   `npm run build:prod` - Production build with optimizations

### Adding React Components

1. Create your component in `src/js/components/`:

    ```jsx
    // src/js/components/YourComponent.jsx
    import React from "react";

    export default function YourComponent({ someProp }) {
    	return <div className="your-component">{someProp}</div>;
    }
    ```

2. Register it in `src/js/react-init.js`:

    ```javascript
    const COMPONENT_MAP = {
    	"hello-react": HelloReact,
    	"your-component": YourComponent, // Add your component here
    };
    ```

3. Use it in your templates with data attributes:
    ```php
    <div
        data-react-component="your-component"
        data-some-prop="Hello World!"
        class="mb-4"
    ></div>
    ```

All data attributes will be passed as props to your React component. For example:

-   `data-some-prop="value"` becomes `someProp="value"`
-   `data-user-id="123"` becomes `userId="123"`

You can also pass JSON data:

```php
<div
    data-react-component="your-component"
    data-config='<?php echo json_encode([
        "apiUrl" => rest_url('wp/v2/posts'),
        "nonce" => wp_create_nonce('wp_rest'),
    ]); ?>'
></div>
```

For TypeScript users, define your props interface:

```tsx
interface YourComponentProps {
	someProp: string;
	config?: {
		apiUrl: string;
		nonce: string;
	};
}

export default function YourComponent({
	someProp,
	config,
}: YourComponentProps) {
	// ...
}
```

### CSS Structure

-   `src/css/style.css` - Main stylesheet
-   `src/css/_navigation.css` - Navigation styles
-   `src/css/_accessibility.css` - Accessibility styles
-   `src/css/_alignments.css` - WordPress alignment styles

## License

MIT License
