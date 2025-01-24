const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");
const TerserPlugin = require("terser-webpack-plugin");

module.exports = (env, argv) => {
	const isProduction = argv.mode === "production";

	return {
		entry: {
			app: "./src/js/app.js",
			"react-init": "./src/js/react-init.js",
			style: "./src/css/style.css",
			login: "./src/css/login.css",
		},
		output: {
			path: path.resolve(__dirname, "dist"),
			filename: "js/[name].js",
			clean: true,
		},
		devtool: isProduction ? false : "source-map",
		module: {
			rules: [
				{
					test: /\.(js|jsx)$/,
					exclude: /node_modules/,
					use: {
						loader: "babel-loader",
						options: {
							presets: [
								"@babel/preset-env",
								"@babel/preset-react",
							],
						},
					},
				},
				{
					test: /\.css$/,
					use: [
						MiniCssExtractPlugin.loader,
						"css-loader",
						{
							loader: "postcss-loader",
							options: {
								postcssOptions: {
									plugins: [
										require("@tailwindcss/postcss"),
										require("autoprefixer"),
									],
								},
							},
						},
					],
				},
			],
		},
		optimization: {
			minimizer: [new CssMinimizerPlugin(), new TerserPlugin()],
		},
		plugins: [
			new MiniCssExtractPlugin({
				filename: "css/[name].css",
			}),
		],
		resolve: {
			extensions: [".js", ".jsx"],
		},
		devServer: {
			proxy: {
				"/": "https://localhost:8080",
			},
			hot: true,
			open: false,
			watchFiles: [
				"./*.php",
				"./inc/**/*.php",
				"./template-parts/**/*.php",
				"./template-pages/**/*.php",
				"./template-partials/**/*.php",
				"./src/js/**/*.js",
				"./src/js/components/**/*.jsx",
				"./src/css/**/*.css",
			],
		},
	};
};
