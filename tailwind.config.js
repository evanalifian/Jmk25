module.exports = {
  content: ["./public/**/*.{html,php}", "./**/*.php", "./Views/**/*.php"],
  darkMode: "class",
  theme: {
    extend: {
      colors: {
        mainBg: "var(--mainBg)",
        secondBg: "var(--secondBg)",
        mainText: "var(--mainText)",
        mainGray: "var(--mainGray)",
        accent: "var(--accent)",
      },
    },
  },
  plugins: [],
};
