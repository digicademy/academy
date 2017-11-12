<?php

namespace Digicademy\Academy\ViewHelpers;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2017 Torsten Schrade <schradt@uni-mainz.de>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

class AlphabetViewHelper extends AbstractViewHelper
{

    /**
     *
     * Called in the context of a f:for loop. Segments an ordered list of strings by starting letter(s). Does it by comparing
     * the starting letter(s) from the current iteration with the starting letter(s) of the former iteration and, if they are
     * different, signals the start of a new group. Uses a character normalization table for taking accented letters into account.
     * Used in conjunction with the Alphabet.html template/partial (https://gist.github.com/tesselation/5888003)
     *
     * @param string  $string
     * @param integer $length
     * @param string  $splitChar
     *
     * @return string
     */
    public function render($string, $length = 1, $splitChar = null)
    {

        // normalize the string (remove accented characters) and cut to length
        $normalizationTable = json_decode('{"\u1e00":"a","\u1e01":"a","\u1e9a":"a","\u1ea0":"a","\u1ea1":"a","\u1ea2":"a","\u1ea3":"a","\u1ea4":"a","\u1ea5":"a","\u1ea6":"a","\u1ea7":"a","\u1ea8":"a","\u1ea9":"a","\u1eaa":"a","\u1eab":"a","\u1eac":"a","\u1ead":"a","\u1eae":"a","\u1eaf":"a","\u1eb0":"a","\u1eb1":"a","\u1eb2":"a","\u1eb3":"a","\u1eb4":"a","\u1eb5":"a","\u1eb6":"a","\u1eb7":"a","\u00c0":"a","\u00c1":"a","\u00c2":"a","\u00c3":"a","\u00c4":"a","\u00c5":"a","\u00e0":"a","\u00e1":"a","\u00e2":"a","\u00e3":"a","\u00e4":"a","\u00e5":"a","\u0100":"a","\u0101":"a","\u0102":"a","\u0103":"a","\u0104":"a","\u0105":"a","\u01cd":"a","\u01ce":"a","\u01de":"a","\u01df":"a","\u01e0":"a","\u01e1":"a","\u01fa":"a","\u01fb":"a","\u0200":"a","\u0201":"a","\u0202":"a","\u0203":"a","\u0226":"a","\u0227":"a","\u023a":"a","\u2c65":"a","\u2c6f":"a","\u0250":"a","\u1e02":"b","\u1e03":"b","\u1e04":"b","\u1e05":"b","\u1e06":"b","\u1e07":"b","\u0180":"b","\u0181":"b","\u0182":"b","\u0183":"b","\u0243":"b","\u0253":"b","\u1e08":"c","\u1e09":"c","\u00c7":"c","\u00e7":"c","\u0106":"c","\u0107":"c","\u0108":"c","\u0109":"c","\u010a":"c","\u010b":"c","\u010c":"c","\u010d":"c","\u0187":"c","\u0188":"c","\u023b":"c","\u023c":"c","\ua73e":"c","\ua73f":"c","\u0255":"c","\u1e0a":"d","\u1e0b":"d","\u1e0c":"d","\u1e0d":"d","\u1e0e":"d","\u1e0f":"d","\u1e10":"d","\u1e11":"d","\u1e12":"d","\u1e13":"d","\u010e":"d","\u010f":"d","\u0110":"d","\u0111":"d","\u0189":"d","\u018a":"d","\u018b":"d","\u018c":"d","\u01c5":"d","\u01f2":"d","\u0221":"d","\ua779":"d","\ua77a":"d","\u0256":"d","\u0257":"d","\u1e14":"e","\u1e15":"e","\u1e16":"e","\u1e17":"e","\u1e18":"e","\u1e19":"e","\u1e1a":"e","\u1e1b":"e","\u1e1c":"e","\u1e1d":"e","\u1eb8":"e","\u1eb9":"e","\u1eba":"e","\u1ebb":"e","\u1ebc":"e","\u1ebd":"e","\u1ebe":"e","\u1ebf":"e","\u1ec0":"e","\u1ec1":"e","\u1ec2":"e","\u1ec3":"e","\u1ec4":"e","\u1ec5":"e","\u1ec6":"e","\u1ec7":"e","\u00c8":"e","\u00c9":"e","\u00ca":"e","\u00cb":"e","\u00e8":"e","\u00e9":"e","\u00ea":"e","\u00eb":"e","\u0112":"e","\u0113":"e","\u0114":"e","\u0115":"e","\u0116":"e","\u0117":"e","\u0118":"e","\u0119":"e","\u011a":"e","\u011b":"e","\u018e":"e","\u0190":"e","\u01dd":"e","\u0204":"e","\u0205":"e","\u0206":"e","\u0207":"e","\u0228":"e","\u0229":"e","\u0246":"e","\u0247":"e","\u2c78":"e","\u0258":"e","\u025b":"e","\u025c":"e","\u025d":"e","\u025e":"e","\u029a":"e","\u1e1e":"f","\u1e1f":"f","\u0191":"f","\u0192":"f","\ua77b":"f","\ua77c":"f","\u1e20":"g","\u1e21":"g","\u011c":"g","\u011d":"g","\u011e":"g","\u011f":"g","\u0120":"g","\u0121":"g","\u0122":"g","\u0123":"g","\u0193":"g","\u01e4":"g","\u01e5":"g","\u01e6":"g","\u01e7":"g","\u01f4":"g","\u01f5":"g","\ua77d":"g","\ua77e":"g","\ua77f":"g","\ua7a0":"g","\ua7a1":"g","\u0260":"g","\u0261":"g","\u1e22":"h","\u1e23":"h","\u1e24":"h","\u1e25":"h","\u1e26":"h","\u1e27":"h","\u1e28":"h","\u1e29":"h","\u1e2a":"h","\u1e2b":"h","\u1e96":"h","\u0124":"h","\u0125":"h","\u0126":"h","\u0127":"h","\u021e":"h","\u021f":"h","\u2c67":"h","\u2c68":"h","\u2c75":"h","\u2c76":"h","\ua78d":"h","\u0265":"h","\u0266":"h","\u02ae":"h","\u02af":"h","\u1e2c":"i","\u1e2d":"i","\u1e2e":"i","\u1e2f":"i","\u1ec8":"i","\u1ec9":"i","\u1eca":"i","\u1ecb":"i","\u00cc":"i","\u00cd":"i","\u00ce":"i","\u00cf":"i","\u00ec":"i","\u00ed":"i","\u00ee":"i","\u00ef":"i","\u0128":"i","\u0129":"i","\u012a":"i","\u012b":"i","\u012c":"i","\u012d":"i","\u012e":"i","\u012f":"i","\u0130":"i","\u0131":"i","\u0197":"i","\u01cf":"i","\u01d0":"i","\u0208":"i","\u0209":"i","\u020a":"i","\u020b":"i","\u0268":"i","\u1e30":"k","\u1e31":"k","\u1e32":"k","\u1e33":"k","\u1e34":"k","\u1e35":"k","\u0136":"k","\u0137":"k","\u0198":"k","\u0199":"k","\u01e8":"k","\u01e9":"k","\u2c69":"k","\u2c6a":"k","\ua740":"k","\ua741":"k","\ua742":"k","\ua743":"k","\ua744":"k","\ua745":"k","\ua7a2":"k","\ua7a3":"k","\u029e":"k","\u1e36":"l","\u1e37":"l","\u1e38":"l","\u1e39":"l","\u1e3a":"l","\u1e3b":"l","\u1e3c":"l","\u1e3d":"l","\u0139":"l","\u013a":"l","\u013b":"l","\u013c":"l","\u013d":"l","\u013e":"l","\u013f":"l","\u0140":"l","\u0141":"l","\u0142":"l","\u019a":"l","\u01c8":"l","\u0234":"l","\u023d":"l","\u2c60":"l","\u2c61":"l","\u2c62":"l","\ua746":"l","\ua747":"l","\ua748":"l","\ua749":"l","\ua780":"l","\ua781":"l","\ua78e":"l","\u026b":"l","\u026c":"l","\u026d":"l","\u1e3e":"m","\u1e3f":"m","\u1e40":"m","\u1e41":"m","\u1e42":"m","\u1e43":"m","\u019c":"m","\u2c6e":"m","\u026f":"m","\u0270":"m","\u0271":"m","\u1e44":"n","\u1e45":"n","\u1e46":"n","\u1e47":"n","\u1e48":"n","\u1e49":"n","\u1e4a":"n","\u1e4b":"n","\u00d1":"n","\u00f1":"n","\u0143":"n","\u0144":"n","\u0145":"n","\u0146":"n","\u0147":"n","\u0148":"n","\u0149":"n","\u019d":"n","\u019e":"n","\u01cb":"n","\u01f8":"n","\u01f9":"n","\u0220":"n","\u0235":"n","\ua790":"n","\ua791":"n","\ua7a4":"n","\ua7a5":"n","\u0272":"n","\u0273":"n","\u1e4c":"o","\u1e4d":"o","\u1e4e":"o","\u1e4f":"o","\u1e50":"o","\u1e51":"o","\u1e52":"o","\u1e53":"o","\u1ecc":"o","\u1ecd":"o","\u1ece":"o","\u1ecf":"o","\u1ed0":"o","\u1ed1":"o","\u1ed2":"o","\u1ed3":"o","\u1ed4":"o","\u1ed5":"o","\u1ed6":"o","\u1ed7":"o","\u1ed8":"o","\u1ed9":"o","\u1eda":"o","\u1edb":"o","\u1edc":"o","\u1edd":"o","\u1ede":"o","\u1edf":"o","\u1ee0":"o","\u1ee1":"o","\u1ee2":"o","\u1ee3":"o","\u00d2":"o","\u00d3":"o","\u00d4":"o","\u00d5":"o","\u00d6":"o","\u00d8":"o","\u00f2":"o","\u00f3":"o","\u00f4":"o","\u00f5":"o","\u00f6":"o","\u00f8":"o","\u014c":"o","\u014d":"o","\u014e":"o","\u014f":"o","\u0150":"o","\u0151":"o","\u0186":"o","\u019f":"o","\u01a0":"o","\u01a1":"o","\u01d1":"o","\u01d2":"o","\u01ea":"o","\u01eb":"o","\u01ec":"o","\u01ed":"o","\u01fe":"o","\u01ff":"o","\u020c":"o","\u020d":"o","\u020e":"o","\u020f":"o","\u022a":"o","\u022b":"o","\u022c":"o","\u022d":"o","\u022e":"o","\u022f":"o","\u0230":"o","\u0231":"o","\u2c7a":"o","\ua74a":"o","\ua74b":"o","\ua74c":"o","\ua74d":"o","\u0254":"o","\u0275":"o","\u1e54":"p","\u1e55":"p","\u1e56":"p","\u1e57":"p","\u01a4":"p","\u01a5":"p","\u2c63":"p","\ua750":"p","\ua751":"p","\ua752":"p","\ua753":"p","\ua754":"p","\ua755":"p","\u1e58":"r","\u1e59":"r","\u1e5a":"r","\u1e5b":"r","\u1e5c":"r","\u1e5d":"r","\u1e5e":"r","\u1e5f":"r","\u0154":"r","\u0155":"r","\u0156":"r","\u0157":"r","\u0158":"r","\u0159":"r","\u0210":"r","\u0211":"r","\u0212":"r","\u0213":"r","\u024c":"r","\u024d":"r","\u2c64":"r","\u2c79":"r","\ua75a":"r","\ua75b":"r","\ua782":"r","\ua783":"r","\ua7a6":"r","\ua7a7":"r","\u0279":"r","\u027a":"r","\u027b":"r","\u027c":"r","\u027d":"r","\u027e":"r","\u027f":"r","\u1e60":"s","\u1e61":"s","\u1e62":"s","\u1e63":"s","\u1e64":"s","\u1e65":"s","\u1e66":"s","\u1e67":"s","\u1e68":"s","\u1e69":"s","\u1e9b":"s","\u1e9c":"s","\u1e9d":"s","\u1e9e":"s","\u00df":"s","\u015a":"s","\u015b":"s","\u015c":"s","\u015d":"s","\u015e":"s","\u015f":"s","\u0160":"s","\u0161":"s","\u017f":"s","\u0218":"s","\u0219":"s","\u023f":"s","\u2c7e":"s","\ua784":"s","\ua785":"s","\ua7a8":"s","\ua7a9":"s","\u0282":"s","\u1e6a":"t","\u1e6b":"t","\u1e6c":"t","\u1e6d":"t","\u1e6e":"t","\u1e6f":"t","\u1e70":"t","\u1e71":"t","\u1e97":"t","\u0162":"t","\u0163":"t","\u0164":"t","\u0165":"t","\u0166":"t","\u0167":"t","\u01ab":"t","\u01ac":"t","\u01ad":"t","\u01ae":"t","\u021a":"t","\u021b":"t","\u0236":"t","\u023e":"t","\u2c66":"t","\ua786":"t","\ua787":"t","\u0287":"t","\u0288":"t","\u1e72":"u","\u1e73":"u","\u1e74":"u","\u1e75":"u","\u1e76":"u","\u1e77":"u","\u1e78":"u","\u1e79":"u","\u1e7a":"u","\u1e7b":"u","\u1ee4":"u","\u1ee5":"u","\u1ee6":"u","\u1ee7":"u","\u1ee8":"u","\u1ee9":"u","\u1eea":"u","\u1eeb":"u","\u1eec":"u","\u1eed":"u","\u1eee":"u","\u1eef":"u","\u1ef0":"u","\u1ef1":"u","\u00d9":"u","\u00da":"u","\u00db":"u","\u00dc":"u","\u00f9":"u","\u00fa":"u","\u00fb":"u","\u00fc":"u","\u0168":"u","\u0169":"u","\u016a":"u","\u016b":"u","\u016c":"u","\u016d":"u","\u016e":"u","\u016f":"u","\u0170":"u","\u0171":"u","\u0172":"u","\u0173":"u","\u01af":"u","\u01b0":"u","\u01d3":"u","\u01d4":"u","\u01d5":"u","\u01d6":"u","\u01d7":"u","\u01d8":"u","\u01d9":"u","\u01da":"u","\u01db":"u","\u01dc":"u","\u0214":"u","\u0215":"u","\u0216":"u","\u0217":"u","\u0244":"u","\u0289":"u","\u1e7c":"v","\u1e7d":"v","\u1e7e":"v","\u1e7f":"v","\u1efc":"v","\u1efd":"v","\u01b2":"v","\u0245":"v","\u2c71":"v","\u2c74":"v","\ua75e":"v","\ua75f":"v","\u028b":"v","\u028c":"v","\u1e80":"w","\u1e81":"w","\u1e82":"w","\u1e83":"w","\u1e84":"w","\u1e85":"w","\u1e86":"w","\u1e87":"w","\u1e88":"w","\u1e89":"w","\u1e98":"w","\u0174":"w","\u0175":"w","\u2c72":"w","\u2c73":"w","\u028d":"w","\u1e8a":"x","\u1e8b":"x","\u1e8c":"x","\u1e8d":"x","\u1e8e":"y","\u1e8f":"y","\u1e99":"y","\u1ef2":"y","\u1ef3":"y","\u1ef4":"y","\u1ef5":"y","\u1ef6":"y","\u1ef7":"y","\u1ef8":"y","\u1ef9":"y","\u1efe":"y","\u1eff":"y","\u00dd":"y","\u00fd":"y","\u00ff":"y","\u0176":"y","\u0177":"y","\u0178":"y","\u01b3":"y","\u01b4":"y","\u0232":"y","\u0233":"y","\u024e":"y","\u024f":"y","\u028e":"y","\u1e90":"z","\u1e91":"z","\u1e92":"z","\u1e93":"z","\u1e94":"z","\u1e95":"z","\u0179":"z","\u017a":"z","\u017b":"z","\u017c":"z","\u017d":"z","\u017e":"z","\u01b5":"z","\u01b6":"z","\u0224":"z","\u0225":"z","\u0240":"z","\u2c6b":"z","\u2c6c":"z","\u2c7f":"z","\ua762":"z","\ua763":"z","\u0290":"z","\u0291":"z","\u00c6":"ae","\u00e6":"ae","\u01e2":"ae","\u01e3":"ae","\u01fc":"ae","\u01fd":"ae","\u0132":"ij","\u0133":"ij","\u0134":"j","\u0135":"j","\u01f0":"j","\u0237":"j","\u0248":"j","\u0249":"j","\u025f":"j","\u0284":"j","\u029d":"j","\u0152":"oe","\u0153":"oe","\u0195":"hv","\u01a2":"oi","\u01a3":"oi","\u01c4":"dz","\u01c6":"dz","\u01f1":"dz","\u01f3":"dz","\u02a3":"dz","\u02a5":"dz","\u01c7":"lj","\u01c9":"lj","\u01ca":"nj","\u01cc":"nj","\u0238":"db","\u0239":"qp","\u024a":"q","\u024b":"q","\ua756":"q","\ua757":"q","\ua758":"q","\ua759":"q","\u02a0":"q","\ua728":"tz","\ua729":"tz","\ua732":"aa","\ua733":"aa","\ua734":"ao","\ua735":"ao","\ua736":"au","\ua737":"au","\ua738":"av","\ua739":"av","\ua73a":"av","\ua73b":"av","\ua73c":"ay","\ua73d":"ay","\ua74e":"oo","\ua74f":"oo","\ua760":"vy","\ua761":"vy","\ufb00":"ff","\ufb01":"fi","\ufb02":"fl","\ufb03":"ffi","\ufb04":"ffl","\ufb05":"st","\ufb06":"st"}',
            true);

        if (isset($splitChar)) {
            $currentLetter = strtoupper(substr(strtr($string, $normalizationTable), 0, strpos($string, $splitChar)));
        } else {
            $currentLetter = strtoupper(substr(strtr($string, $normalizationTable), 0, (int)$length));
        }

        // comparison of current with former letter
        if ($this->templateVariableContainer->exists('initialLetter')) {
            $formerLetter = $this->templateVariableContainer->get('initialLetter');
            if ($currentLetter !== $formerLetter) {
                if ($this->templateVariableContainer->exists('newBlock')) {
                    $this->templateVariableContainer->remove('newBlock');
                }
                $this->templateVariableContainer->add('newBlock', true);
                $this->templateVariableContainer->remove('initialLetter');
                $this->templateVariableContainer->add('initialLetter', $currentLetter);

                return;
            } else {
                if ($this->templateVariableContainer->exists('newBlock')) {
                    $this->templateVariableContainer->remove('newBlock');
                }

                return;
            }
        } else {
            $this->templateVariableContainer->add('initialLetter', $currentLetter);

            return;
        }
    }

}
