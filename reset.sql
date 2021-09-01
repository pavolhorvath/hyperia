DROP TABLE IF EXISTS `articles`;

CREATE TABLE `articles` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `title` varchar(100) NOT NULL,
    `content` longtext NOT NULL,
    `autor` varchar(100) NOT NULL,
    `cdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8;

INSERT INTO `hyperia`.`articles`
(`id`,
 `title`,
 `content`,
 `autor`)
VALUES
(1,
 'Dark Energy, Dark Matter',
 '<div class="panel-panel panel-col-first">
    <div class="inside"><div class="panel-pane pane-entity-field pane-node-body">
            <div class="field field--name-body field--type-text-with-summary field--label-hidden"><div class="field__items"><div class="field__item even" property="content:encoded"><!--?xml encoding="UTF-8"-->
<p>In the early 1990s, one thing was fairly certain about the expansion of the universe. It might have enough energy density to stop its expansion and recollapse, it might have so little energy density that it would never stop expanding, but gravity was certain to slow the expansion as time went on. Granted, the slowing had not been observed, but, theoretically, the universe had to slow. The universe is full of matter and the attractive force of gravity pulls all matter together. Then came 1998 and the Hubble Space Telescope (HST) observations of very distant supernovae that showed that, a long time ago, the universe was actually expanding more slowly than it is today. So the expansion of the universe has not been slowing due to gravity, as everyone thought, it has been accelerating. No one expected this, no one knew how to explain it. But something was causing it.</p>

<p>Eventually theorists came up with three sorts of explanations. Maybe it was a result of a long-discarded version of Einstein''s theory of gravity, one that contained what was called a "cosmological constant." Maybe there was some strange kind of energy-fluid that filled space. Maybe there is something wrong with Einstein''s theory of gravity and a new theory could include some kind of field that creates this cosmic acceleration. Theorists still don''t know what the correct explanation is, but they have given the solution a name. It is called dark energy.</p>

<h4>What Is Dark Energy?</h4>

<p>More is unknown than is known. We know how much dark energy there is because we know how it affects the universe''s expansion. Other than that, it is a complete mystery. But it is an important mystery. It turns out that <a href="http://www.nasa.gov/mission_pages/planck/news/planck20130321.html">roughly 68%</a> of the universe is dark energy. Dark matter makes up about 27%. The rest - everything on Earth, everything ever observed with all of our instruments, all normal matter - adds up to less than 5% of the universe. Come to think of it, maybe it shouldn''t be called "normal" matter at all, since it is such a small fraction of the universe.</p>

<div style="background-color:Gainsboro;padding:20px;">
<div>
<div class="dnd-widget-wrapper context-default type-image atom-align-center"><div class="dnd-atom-rendered"><!-- scald=4066:default {"link":"http%3A%2F%2Fhubblesite.org%2Fnewscenter%2Farchive%2Freleases%2F2001%2F09%2Fimage%2Fg%2F","additionalClasses":""} --><a href="http://hubblesite.org/newscenter/archive/releases/2001/09/image/g/" target="_blank"><img typeof="foaf:Image" src="https://science.nasa.gov/files/science-red/s3fs-public/styles/large/public/thumbnails/image/magnetosphere cropped.JPG?itok=r3yE6cs4" width="480" height="294" alt="Changes in the Rate of Expansion over Time" img-title="magnetopshere_image_1"></a><!-- END scald=4066 --></div></div>
</div>

<div><a href="http://hubblesite.org/newscenter/archive/releases/2001/09/image/g/" target="_blank"><strong><span style="font-size:12px;"><em>Universe Dark Energy-1 Expanding Universe</em></span></strong></a></div>

<div><span style="font-size:12px;"><em>This diagram reveals changes in the rate of expansion since the universe''s birth 15 billion years ago. The more shallow the curve, the faster the rate of expansion. The curve changes noticeably about 7.5 billion years ago, when objects in the universe began flying apart as a faster rate. Astronomers theorize that the faster expansion rate is due to a mysterious, dark force that is pulling galaxies apart.</em></span></div>

<div><span style="font-size:12px;"><em>Credit: NASA/STSci/Ann Feild</em></span></div>
</div>

<p><br>
One explanation for dark energy is that it is a property of space. Albert Einstein was the first person to realize that empty space is not nothing. Space has amazing properties, many of which are just beginning to be understood. The first property that Einstein discovered is that it is possible for more space to come into existence. Then one version of Einstein''s gravity theory, the version that contains a <a href="http://www.nasa.gov/mission_pages/planck/news/planck20130321.html">cosmological constant</a>, makes a second prediction: "empty space" can possess its own energy. Because this energy is a property of space itself, it would not be diluted as space expands. As more space comes into existence, more of this energy-of-space would appear. As a result, this form of energy would cause the universe to expand faster and faster. Unfortunately, no one understands why the cosmological constant should even be there, much less why it would have exactly the right value to cause the observed acceleration of the universe.&nbsp;</p>

<div style="background-color:Gainsboro;padding:20px;">
<div>
<div class="dnd-widget-wrapper context-default type-image atom-align-center"><div class="dnd-atom-rendered"><!-- scald=4067:default {"link":"http%3A%2F%2Fhubblesite.org%2Fnewscenter%2Farchive%2Freleases%2F2012%2F10%2Ffull%2F","additionalClasses":""} --><a href="http://hubblesite.org/newscenter/archive/releases/2012/10/full/" target="_blank"><img typeof="foaf:Image" src="https://science.nasa.gov/files/science-red/s3fs-public/styles/large/public/mnt/medialibrary/2012/03/06/Dark_Matter_Core.jpg?itok=gZ_LLyWt" width="200" height="200" alt="Dark Matter Core Defies Explanation" img-title="Dark_Matter_Core.jpg"></a><!-- END scald=4067 --></div></div>

<div><a href="http://hubblesite.org/newscenter/archive/releases/2012/10/full/" target="_blank"><em><span style="font-size:12px;"><strong>Dark Matter Core Defies Explanation</strong></span></em></a></div>

<div><em><span style="font-size:12px;">This image shows the distribution of dark matter, galaxies, and hot gas in the core of the merging galaxy cluster Abell 520. The result could present a challenge to basic theories of dark matter.</span></em></div>
</div>
</div>

<p><br>
Another explanation for how space acquires energy comes from the quantum theory of matter. In this theory, "empty space" is actually full of temporary ("virtual") particles that continually form and then disappear. But when physicists tried to calculate how much energy this would give empty space, the answer came out wrong - wrong by a lot. The number came out 10<sup>120</sup> times too big. That''s a 1 with 120 zeros after it. It''s hard to get an answer that bad. So the mystery continues.</p>

<p>Another explanation for dark energy is that it is a new kind of dynamical energy fluid or field, something that fills all of space but something whose effect on the expansion of the universe is the opposite of that of matter and normal energy. Some theorists have named this "quintessence," after the fifth element of the Greek philosophers. But, if quintessence is the answer, we still don''t know what it is like, what it interacts with, or why it exists. So the mystery continues.</p>

<p>A last possibility is that Einstein''s theory of gravity is not correct. That would not only affect the expansion of the universe, but it would also affect the way that normal matter in galaxies and clusters of galaxies behaved. This fact would provide a way to decide if the solution to the dark energy problem is a new gravity theory or not: we could observe how galaxies come together in clusters. But if it does turn out that a new theory of gravity is needed, what kind of theory would it be? How could it correctly describe the motion of the bodies in the Solar System, as Einstein''s theory is known to do, and still give us the different prediction for the universe that we need? There are candidate theories, but none are compelling. So the mystery continues.</p>

<p>The thing that is needed to decide between dark energy possibilities - a property of space, a new dynamic fluid, or a new theory of gravity - is more data, better data.</p>

<h4>What Is Dark Matter?</h4>

<p>By fitting a theoretical model of the composition of the universe to the combined set of cosmological observations, scientists have come up with the composition that we described above, ~68% dark energy, ~27% dark matter, ~5% normal matter. What is dark matter?</p>

<p>We are much more certain what dark matter is not than we are what it is. First, it is dark, meaning that it is not in the form of stars and planets that we see. Observations show that there is far too little visible matter in the universe to make up the 27% required by the observations. Second, it is not in the form of dark clouds of normal matter, matter made up of particles called baryons. We know this because we would be able to detect baryonic clouds by their absorption of radiation passing through them. Third, dark matter is not antimatter, because we do not see the unique gamma rays that are produced when antimatter annihilates with matter. Finally, we can rule out large galaxy-sized black holes on the basis of how many gravitational lenses we see. High concentrations of matter bend light passing near them from objects further away, but we do not see enough lensing events to suggest that such objects to make up the required 25% dark matter contribution.</p>

<div style="background-color:Gainsboro;padding:20px;">
<div class="dnd-widget-wrapper context-default type-image atom-align-center"><div class="dnd-atom-rendered"><!-- scald=4068:default {"additionalClasses":"","link":"http%3A%2F%2Fchandra.harvard.edu%2Fphoto%2F2011%2Fa2744%2F"} --><a href="http://chandra.harvard.edu/photo/2011/a2744/" target="_blank"><img typeof="foaf:Image" src="https://science.nasa.gov/files/science-red/s3fs-public/styles/large/public/thumbnails/image/a2744_small_0.jpg?itok=kiI1XLDz" width="216" height="216" alt="a2744.jpg" img-title="a2744.jpg"></a><!-- END scald=4068 --></div></div>

<div><a href="http://chandra.harvard.edu/photo/2011/a2744/" target="_blank"><strong><span style="font-size:12px;"><em>Abell 2744: Pandora''s Cluster Revealed</em></span></strong></a></div>

<div><span style="font-size:12px;"><em>One of the most complicated and dramatic collisions between galaxy clusters ever seen is captured in this new composite image of Abell 2744. The blue shows a map of the total mass concentration (mostly dark matter).</em></span></div>
</div>

<p><br>
However, at this point, there are still a few dark matter possibilities that are viable. Baryonic matter could still make up the dark matter if it were all tied up in brown dwarfs or in small, dense chunks of heavy elements. These possibilities are known as massive compact halo objects, or "<a href="http://imagine.gsfc.nasa.gov/educators/galaxies/imagine/dark_matter.html">MACHOs</a>". But the most common view is that dark matter is not baryonic at all, but that it is made up of other, more exotic particles like axions or <a href="http://imagine.gsfc.nasa.gov/educators/galaxies/imagine/dark_matter.html">WIMPS (Weakly Interacting Massive Particles)</a>.</p>

<div style="background-color:Gainsboro;padding:20px;">
<div>
<div class="dnd-widget-wrapper context-recommended_articles_image type-image atom-align-center"><div class="dnd-atom-rendered"><!-- scald=16113:recommended_articles_image {"link":"http%3A%2F%2Fhubblesite.org%2Fnews_release%2Fnews%2F2018-16","additionalClasses":""} --><a href="http://hubblesite.org/news_release/news/2018-16" target="_blank"><img typeof="foaf:Image" src="https://science.nasa.gov/files/science-red/s3fs-public/styles/recommended_article_thumb/public/thumbnails/image/STSCI-H-p1816a-z.png?itok=SG8n6oQi" alt="NGC 1052-DF2" img-title="STSCI-H-p1816a-z.png"></a><!-- END scald=16113 --></div></div>
<strong><span style="font-size:12px;"><em><a href="http://hubblesite.org/news_release/news/2018-16" target="_blank">D</a></em></span></strong><a href="http://hubblesite.org/news_release/news/2018-16" target="_blank"><strong><span style="font-size:12px;"><em>ark Matter Goes Missing in Oddball Galaxy</em></span></strong></a></div>

<div><span style="font-size:12px;"><em>Researchers were surprised when they uncovered galaxy NGC 1052-DF2 which is missing most, if not all, of its dark matter.</em></span></div>
</div></div></div></div></div></div></div>',
 'SAN');

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `autor` varchar(100) NOT NULL,
    `content` longtext NOT NULL,
    `cdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `parent_id` int(11) NOT NULL,
    `positive` int(11) NOT NULL,
    `negative` int(11) NOT NULL,
    `article_id` int(11) NOT NULL,
    PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8;

INSERT INTO `hyperia`.`comments`
(`autor`,
 `content`,
 `parent_id`,
 `positive`,
 `negative`,
 `article_id`)
VALUES
('Thomas',
 'Very interesting article, I can recommend to anyone who is interested in the topic.',
 0,
 3,
 1,
 1);

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
     `id` int(11) NOT NULL AUTO_INCREMENT,
     `login` varchar(100) NOT NULL,
     `password` varchar(100) NOT NULL,
     `name` varchar(100) NOT NULL,
     `token` varchar(45) DEFAULT NULL,
     `token_validity` datetime DEFAULT NULL,
     PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8;

INSERT INTO `users`
(`login`,
 `password`,
 `name`)
VALUES
('admin',
MD5('admin'),
'Ragnar Lodbrok');