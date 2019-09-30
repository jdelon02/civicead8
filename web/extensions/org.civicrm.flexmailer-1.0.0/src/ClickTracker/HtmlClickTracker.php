<?php
/*
 +--------------------------------------------------------------------+
 | CiviCRM version 4.7                                                |
 +--------------------------------------------------------------------+
 | Copyright CiviCRM LLC (c) 2004-2017                                |
 +--------------------------------------------------------------------+
 | This file is a part of CiviCRM.                                    |
 |                                                                    |
 | CiviCRM is free software; you can copy, modify, and distribute it  |
 | under the terms of the GNU Affero General Public License           |
 | Version 3, 19 November 2007 and the CiviCRM Licensing Exception.   |
 |                                                                    |
 | CiviCRM is distributed in the hope that it will be useful, but     |
 | WITHOUT ANY WARRANTY; without even the implied warranty of         |
 | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.               |
 | See the GNU Affero General Public License for more details.        |
 |                                                                    |
 | You should have received a copy of the GNU Affero General Public   |
 | License and the CiviCRM Licensing Exception along                  |
 | with this program; if not, contact CiviCRM LLC                     |
 | at info[AT]civicrm[DOT]org. If you have questions about the        |
 | GNU Affero General Public License or the licensing of CiviCRM,     |
 | see the CiviCRM license FAQ at http://civicrm.org/licensing        |
 +--------------------------------------------------------------------+
 */
namespace Civi\FlexMailer\ClickTracker;

class HtmlClickTracker implements ClickTrackerInterface {

  public function filterContent($msg, $mailing_id, $queue_id) {
    return self::replaceHrefUrls($msg,
      function ($url) use ($mailing_id, $queue_id) {
        if (strpos($url, '{') !== FALSE) {
          return $url;
        }
        $data = \CRM_Mailing_BAO_TrackableURL::getTrackerURL(
          $url, $mailing_id, $queue_id);
        $data = htmlentities($data, ENT_NOQUOTES);
        return $data;
      }
    );
  }

  /**
   * Find any HREF-style URLs and replace them.
   *
   * @param string $html
   * @param callable $replace
   *   Function(string $oldHtmlUrl) => string $newHtmlUrl.
   * @return mixed
   *   String, HTML.
   */
  public static function replaceHrefUrls($html, $replace) {
    $useNoFollow = version_compare(\CRM_Utils_System::version(), '5.5.alpha1', '>=');
    $callback = function ($matches) use ($replace, $useNoFollow) {
      $replacement = $replace($matches[2]);

      // See: https://github.com/civicrm/civicrm-core/pull/12561
      // If we track click-throughs on a link, then don't encourage search-engines to traverse them.
      // At a policy level, I'm not sure I completely agree, but this keeps things consistent.
      // You can tell if we're tracking a link because $replace() yields a diff URL.
      $noFollow = '';
      if ($useNoFollow && $replacement !== $matches[2]) {
        $noFollow = " rel='nofollow'";
      }

      return $matches[1] . $replace($matches[2]) . $matches[3] . $noFollow;
    };

    // Find anything like href="..." or href='...' inside a tag.
    $tmp = preg_replace_callback(
      ';(\<[^>]*href *= *")([^">]+)(");', $callback, $html);
    return preg_replace_callback(
      ';(\<[^>]*href *= *\')([^">]+)(\');', $callback, $tmp);
  }

  //  /**
  //   * Find URL expressions; replace them with tracked URLs.
  //   *
  //   * @param string $msg
  //   * @param int $mailing_id
  //   * @param int|string $queue_id
  //   * @param bool $html
  //   * @return string
  //   *   Updated $msg
  //   */
  //  public static function scanAndReplace_old($msg, $mailing_id, $queue_id, $html = FALSE) {
  //
  //    $protos = '(https?|ftp)';
  //    $letters = '\w';
  //    $gunk = '/#~:.?+=&%@!\-';
  //    $punc = '.:?\-';
  //    $any = "{$letters}{$gunk}{$punc}";
  //    if ($html) {
  //      $pattern = "{\\b(href=([\"'])?($protos:[$any]+?(?=[$punc]*[^$any]|$))([\"'])?)}im";
  //    }
  //    else {
  //      $pattern = "{\\b($protos:[$any]+?(?=[$punc]*[^$any]|$))}eim";
  //    }
  //
  //    $trackURL = \CRM_Mailing_BAO_TrackableURL::getTrackerURL('\\1', $mailing_id, $queue_id);
  //    $replacement = $html ? ("href=\"{$trackURL}\"") : ("\"{$trackURL}\"");
  //
  //    $msg = preg_replace($pattern, $replacement, $msg);
  //    if ($html) {
  //      $msg = htmlentities($msg, ENT_NOQUOTES);
  //    }
  //    return $msg;
  //  }

}
