import displayimg from './display_img.twig';
import displayimgdata from './display_img.yml';

import './_display_img.scss';

/**
 * Storybook Definition.
 */
export default { title: 'Molecules/display_img' };

export const displayimg1 = () => displayimg(displayimgdata);
