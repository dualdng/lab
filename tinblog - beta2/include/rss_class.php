<?php
class RSS 
{
		public	$rss_ver = '2.0';
		public  $channel_title = '';
		public  $channel_link = '';
		public  $channel_description = '';
		public  $language = 'zh_CN';
		public  $copyright = '';
		public  $webMaster = '';
		public  $pubDate = '';
		public  $lastBuildDate = '';
		public  $generator = 'RedFox RSS Generator';
		public  $content = '';
		public  $items = array();
		function RSS($title, $link, $description) {
				$this->channel_title = $title;
				$this->channel_link = $link;
				$this->channel_description = $description;
				$this->pubDate = Date('Y-m-d H:i:s',time());
				$this->lastBuildDate = Date('Y-m-d H:i:s',time());
		}

		function AddItem($title, $link, $description ,$pubDate) {
				$this->items[] = array('title' => $title ,
								'link' => $link,
								'description' => $description, 
								'pubDate' => $pubDate);
		}

		function BuildRSS() {
				$s = "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n<rss version=\"2.0\"> \n";
				// start channel
				$s .= "<channel>\n";
				$s .= "<title>{$this->channel_title}</title>\n";
						$s .= "<link>{$this->channel_link}</link>\n";
				$s .= "<description>{$this->channel_description}</description>\n";
				$s .= "<language>{$this->language}</language>\n";
				if (!empty($this->copyright)) {
						$s .= "<copyright>{$this->copyright}</copyright>\n";
				}
				if (!empty($this->webMaster)) {
						$s .= "<webMaster>{$this->webMaster}</webMaster>\n";
				}
				if (!empty($this->pubDate)) {
						$s .= "<pubDate>{$this->pubDate}</pubDate>\n";
				}

				if (!empty($this->lastBuildDate)) {
						$s .= "<lastBuildDate>{$this->lastBuildDate}</lastBuildDate>\n";
				}

				if (!empty($this->generator)) {
						$s .= "<generator>{$this->generator}</generator>\n";
				}

				// start items
				for ($i=0;$i<count($this->items);$i++) {
						$s .= "<item>\n";
						$s .= "<title>{$this->items[$i]['title']}</title>\n";
						$s .= "<link><![CDATA[{$this->items[$i]['link']}]]></link>\n";
						$s .= "<description><![CDATA[{$this->items[$i]['description']}]]></description>\n";
						$s .= "<pubDate>{$this->items[$i]['pubDate']}</pubDate>\n";           
						$s .= "</item>\n";
				}

				// close channel
				$s .= "</channel>\n</rss>";
				$this->content = $s;
		}

		function Show() {
				if (empty($this->content)) $this->BuildRSS();
				header('Content-type:application/json;charset=\'utf-8\'');
				echo ($this->content);
		}

		function SaveToFile($fname) {
				if (empty($this->content)) $this->BuildRSS();
				$handle = fopen($fname, 'wb');
				if ($handle === false)  return false;
				fwrite($handle, $this->content);
				fclose($handle);
		}
}

?>
