import navbar from './navbar.twig';
import navbarData from './navbar.yml';

import './navbar.scss';
import './navbar';

/**
 * Storybook Definition.
 */
export default { title: 'Organisms/navbar' };

export const navbar1 = () => navbar(navbarData);
