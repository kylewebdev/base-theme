import { createRoot } from "react-dom/client";
import React, { useState } from "react";

export default function HelloReact() {
	const [count, setCount] = useState(0);

	const handleIncrement = () => {
		setCount((prevCount) => prevCount + 1);
	};

	const handleDecrement = () => {
		setCount((prevCount) => prevCount - 1);
	};

	return (
		<div>
			<button onClick={handleDecrement}>-</button>
			<span> {count} </span>
			<button onClick={handleIncrement}>+</button>
		</div>
	);
}

if (document.getElementById("hello-react")) {
	const root = createRoot(document.getElementById("hello-react"));
	root.render(<HelloReact />);
}
