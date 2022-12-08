import heropage from './heropage.twig';
import heropageData from './heropage.yml';

import './_heropage.scss';

/**
 * Storybook Definition.
 */
export default { title: 'Molecules/heropage' };

export const heropage1 = () => heropage(heropageData);
