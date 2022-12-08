import products from './products.twig';
import productsData from './products.yml';

import './_products.scss';
// import './products';
import '../../../node_modules/wowjs/css/libs/animate.css';
import '../../../node_modules/wowjs/dist/wow.min';

/**
 * Storybook Definition.
 */
export default { title: 'Molecules/products' };

export const products1 = () => products(productsData);
