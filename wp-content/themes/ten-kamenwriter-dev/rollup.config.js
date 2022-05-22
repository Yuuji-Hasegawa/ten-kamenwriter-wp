import { terser } from 'rollup-plugin-terser';

export default {
  input: 'src/js/app.mjs',
  output: [
    {
      file: 'js/lib.js',
      format: 'cjs',
      plugins: [terser()],
    },
  ],
};
