/** @type {import('tailwindcss').Config} */
export default {
	content: ['./src/**/*.{astro,html,js,jsx,md,mdx,svelte,ts,tsx,vue}'],
	theme: {
		extend: {
      colors: {
        primary: '#0F172A', // Slate 900
        secondary: '#3B82F6', // Blue 500
        accent: '#10B981', // Emerald 500
      }
    },
	},
	plugins: [],
}
