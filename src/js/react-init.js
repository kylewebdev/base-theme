import React from "react";
import { createRoot } from "react-dom/client";
import HelloReact from "./components/HelloReact";

// Define component mapping
const COMPONENT_MAP = {
	"hello-react": HelloReact,
};

// Initialize all React roots
document.addEventListener("DOMContentLoaded", () => {
	// Find all React root elements
	Object.entries(COMPONENT_MAP).forEach(([id, Component]) => {
		const elements = document.querySelectorAll(
			`[data-react-component="${id}"]`
		);

		elements.forEach((element) => {
			// Get props from data attributes if needed
			const props = element.dataset;

			const root = createRoot(element);
			root.render(<Component {...props} />);
		});
	});
});
