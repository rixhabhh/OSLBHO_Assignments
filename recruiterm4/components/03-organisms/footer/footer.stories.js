import footer from './footer.twig';
import footerData from './footer.yml';

import './_footer.scss';

/**
 * Storybook Definition.
 */
export default { title: 'Organisms/footer' };

export const footer1 = () => footer(footerData);
