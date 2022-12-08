import card from './card.twig';
import cardData from './card.yml';

import './_card.scss';

/**
 * Storybook Definition.
 */
export default { title: 'Molecules/card' };

export const card1 = () => card(cardData);
