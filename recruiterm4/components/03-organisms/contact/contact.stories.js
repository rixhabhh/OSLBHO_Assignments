import contact from './contact.twig';
import contactData from './contact.yml';

import './_contact.scss';

/**
 * Storybook Definition.
 */
export default { title: 'Organisms/contact' };

export const contact1 = () => contact(contactData);
