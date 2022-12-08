import card from './card_listing.twig';
import './_card_listing.scss';

// import cardData from '../../02-molecules/card/card.yml';
import cardData1 from './card_listing.yml';
/**
 * Storybook Definition.
 */
export default { title: 'Organisms/Card Listing' };

export const cardList = () => card(cardData1);
