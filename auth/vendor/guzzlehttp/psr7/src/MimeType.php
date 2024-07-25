<?php

declare(strict_types=1);

namespace GuzzleHttp\Psr7;

final class MimeType
{
    private const MIME_TYPES = [
        '1km' => 'application/vnd.1000minds.decision-model+xml',
        '3dml' => 'text/vnd.in3d.3dml',
        '3ds' => 'image/x-3ds',
        '3g2' => 'video/3gpp2',
        '3gp' => 'video/3gp',
        '3gpp' => 'video/3gpp',
        '3mf' => 'model/3mf',
        '7z' => 'application/x-7z-compressed',
        '7zip' => 'application/x-7z-compressed',
        '123' => 'application/vnd.lotus-1-2-3',
        'aab' => 'application/x-authorware-bin',
        'aac' => 'audio/x-acc',
        'aam' => 'application/x-authorware-map',
        'aas' => 'application/x-authorware-seg',
        'abw' => 'application/x-abiword',
        'ac' => 'application/vnd.nokia.n-gage.ac+xml',
        'ac3' => 'audio/ac3',
        'acc' => 'application/vnd.americandynamics.acc',
        'ace' => 'application/x-ace-compressed',
        'acu' => 'application/vnd.acucobol',
        'acutc' => 'application/vnd.acucorp',
        'adp' => 'audio/adpcm',
        'aep' => 'application/vnd.audiograph',
        'afm' => 'application/x-font-type1',
        'afp' => 'application/vnd.ibm.modcap',
        'age' => 'application/vnd.age',
        'ahead' => 'application/vnd.ahead.space',
        'ai' => 'application/pdf',
        'aif' => 'audio/x-aiff',
        'aifc' => 'audio/x-aiff',
        'aiff' => 'audio/x-aiff',
        'air' => 'application/vnd.adobe.air-application-installer-package+zip',
        'ait' => 'application/vnd.dvb.ait',
        'ami' => 'application/vnd.amiga.ami',
        'amr' => 'audio/amr',
        'apk' => 'application/vnd.android.package-archive',
        'apng' => 'image/apng',
        'appcache' => 'text/cache-manifest',
        'application' => 'application/x-ms-application',
        'apr' => 'application/vnd.lotus-approach',
        'arc' => 'application/x-freearc',
        'arj' => 'application/x-arj',
        'asc' => 'application/pgp-signature',
        'asf' => 'video/x-ms-asf',
        'asm' => 'text/x-asm',
        'aso' => 'application/vnd.accpac.simply.aso',
        'asx' => 'video/x-ms-asf',
        'atc' => 'application/vnd.acucorp',
        'atom' => 'application/atom+xml',
        'atomcat' => 'application/atomcat+xml',
        'atomdeleted' => 'application/atomdeleted+xml',
        'atomsvc' => 'application/atomsvc+xml',
        'atx' => 'application/vnd.antix.game-component',
        'au' => 'audio/x-au',
        'avci' => 'image/avci',
        'avcs' => 'image/avcs',
        'avi' => 'video/x-msvideo',
        'avif' => 'image/avif',
        'aw' => 'application/applixware',
        'azf' => 'application/vnd.airzip.filesecure.azf',
        'azs' => 'application/vnd.airzip.filesecure.azs',
        'azv' => 'image/vnd.airzip.accelerator.azv',
        'azw' => 'application/vnd.amazon.ebook',
        'b16' => 'image/vnd.pco.b16',
        'bat' => 'application/x-msdownload',
        'bcpio' => 'application/x-bcpio',
        'bdf' => 'application/x-font-bdf',
        'bdm' => 'application/vnd.syncml.dm+wbxml',
        'bdoc' => 'application/x-bdoc',
        'bed' => 'application/vnd.realvnc.bed',
        'bh2' => 'application/vnd.fujitsu.oasysprs',
        'bin' => 'application/octet-stream',
        'blb' => 'application/x-blorb',
        'blorb' => 'application/x-blorb',
        'bmi' => 'application/vnd.bmi',
        'bmml' => 'application/vnd.balsamiq.bmml+xml',
        'bmp' => 'image/bmp',
        'book' => 'application/vnd.framemaker',
        'box' => 'application/vnd.previewsystems.box',
        'boz' => 'application/x-bzip2',
        'bpk' => 'application/octet-stream',
        'bpmn' => 'application/octet-stream',
        'bsp' => 'model/vnd.valve.source.compiled-map',
        'btif' => 'image/prs.btif',
        'buffer' => 'application/octet-stream',
        'bz' => 'application/x-bzip',
        'bz2' => 'application/x-bzip2',
        'c' => 'text/x-c',
        'c4d' => 'application/vnd.clonk.c4group',
        'c4f' => 'application/vnd.clonk.c4group',
        'c4g' => 'application/vnd.clonk.c4group',
        'c4p' => 'application/vnd.clonk.c4group',
        'c4u' => 'application/vnd.clonk.c4group',
        'c11amc' => 'application/vnd.cluetrust.cartomobile-config',
        'c11amz' => 'application/vnd.cluetrust.cartomobile-config-pkg',
        'cab' => 'application/vnd.ms-cab-compressed',
        'caf' => 'audio/x-caf',
        'cap' => 'application/vnd.tcpdump.pcap',
        'car' => 'application/vnd.curl.car',
        'cat' => 'application/vnd.ms-pki.seccat',
        'cb7' => 'application/x-cbr',
        'cba' => 'application/x-cbr',
        'cbr' => 'application/x-cbr',
        'cbt' => 'application/x-cbr',
        'cbz' => 'application/x-cbr',
        'cc' => 'text/x-c',
        'cco' => 'application/x-cocoa',
        'cct' => 'application/x-director',
        'ccxml' => 'application/ccxml+xml',
        'cdbcmsg' => 'application/vnd.contact.cmsg',
        'cdf' => 'application/x-netcdf',
        'cdfx' => 'application/cdfx+xml',
        'cdkey' => 'application/vnd.mediastation.cdkey',
        'cdmia' => 'application/cdmi-capability',
        'cdmic' => 'application/cdmi-container',
        'cdmid' => 'application/cdmi-domain',
        'cdmio' => 'application/cdmi-object',
        'cdmiq' => 'application/cdmi-queue',
        'cdr' => 'application/cdr',
        'cdx' => 'chemical/x-cdx',
        'cdxml' => 'application/vnd.chemdraw+xml',
        'cdy' => 'application/vnd.cinderella',
        'cer' => 'application/pkix-cert',
        'cfs' => 'application/x-cfs-compressed',
        'cgm' => 'image/cgm',
        'chat' => 'application/x-chat',
        'chm' => 'application/vnd.ms-htmlhelp',
        'chrt' => 'application/vnd.kde.kchart',
        'cif' => 'chemical/x-cif',
        'cii' => 'application/vnd.anser-web-certificate-issue-initiation',
        'cil' => 'application/vnd.ms-artgalry',
        'cjs' => 'application/node',
        'cla' => 'application/vnd.claymore',
        'class' => 'application/octet-stream',
        'clkk' => 'application/vnd.crick.clicker.keyboard',
        'clkp' => 'application/vnd.crick.clicker.palette',
        'clkt' => 'application/vnd.crick.clicker.template',
        'clkw' => 'application/vnd.crick.clicker.wordbank',
        'clkx' => 'application/vnd.crick.clicker',
        'clp' => 'application/x-msclip',
        'cmc' => 'application/vnd.cosmocaller',
        'cmdf' => 'chemical/x-cmdf',
        'cml' => 'chemical/x-cml',
        'cmp' => 'application/vnd.yellowriver-custom-menu',
        'cmx' => 'image/x-cmx',
        'cod' => 'application/vnd.rim.cod',
        'coffee' => 'text/coffeescript',
        'com' => 'application/x-msdownload',
        'conf' => 'text/plain',
        'cpio' => 'application/x-cpio',
        'cpl' => 'application/cpl+xml',
        'cpp' => 'text/x-c',
        'cpt' => 'application/mac-compactpro',
        'crd' => 'application/x-mscardfile',
        'crl' => 'application/pkix-crl',
        'crt' => 'application/x-x509-ca-cert',
        'crx' => 'application/x-chrome-extension',
        'cryptonote' => 'application/vnd.rig.cryptonote',
        'csh' => 'application/x-csh',
        'csl' => 'application/vnd.citationstyles.style+xml',
        'csml' => 'chemical/x-csml',
        'csp' => 'application/vnd.commonspace',
        'csr' => 'application/octet-stream',
        'css' => 'text/css',
        'cst' => 'application/x-director',
        'csv' => 'text/csv',
        'cu' => 'application/cu-seeme',
        'curl' => 'text/vnd.curl',
        'cww' => 'application/prs.cww',
        'cxt' => 'application/x-director',
        'cxx' => 'text/x-c',
        'dae' => 'model/vnd.collada+xml',
        'daf' => 'application/vnd.mobius.daf',
        'dart' => 'application/vnd.dart',
        'dataless' => 'application/vnd.fdsn.seed',
        'davmount' => 'application/davmount+xml',
        'dbf' => 'application/vnd.dbf',
        'dbk' => 'application/docbook+xml',
        'dcr' => 'application/x-director',
        'dcurl' => 'text/vnd.curl.dcurl',
        'dd2' => 'application/vnd.oma.dd2+xml',
        'ddd' => 'application/vnd.fujixerox.ddd',
        'ddf' => 'application/vnd.syncml.dmddf+xml',
        'dds' => 'image/vnd.ms-dds',
        'deb' => 'application/x-debian-package',
        'def' => 'text/plain',
        'deploy' => 'application/octet-stream',
        'der' => 'application/x-x509-ca-cert',
        'dfac' => 'application/vnd.dreamfactory',
        'dgc' => 'application/x-dgc-compressed',
        'dic' => 'text/x-c',
        'dir' => 'application/x-director',
        'dis' => 'application/vnd.mobius.dis',
        'disposition-notification' => 'message/disposition-notification',
        'dist' => 'application/octet-stream',
        'distz' => 'application/octet-stream',
        'djv' => 'image/vnd.djvu',
        'djvu' => 'image/vnd.djvu',
        'dll' => 'application/octet-stream',
        'dmg' => 'application/x-apple-diskimage',
        'dmn' => 'application/octet-stream',
        'dmp' => 'application/vnd.tcpdump.pcap',
        'dms' => 'application/octet-stream',
        'dna' => 'application/vnd.dna',
        'doc' => 'application/msword',
        'docm' => 'application/vnd.ms-word.template.macroEnabled.12',
        'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'dot' => 'application/msword',
        'dotm' => 'application/vnd.ms-word.template.macroEnabled.12',
        'dotx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.template',
        'dp' => 'application/vnd.osgi.dp',
        'dpg' => 'application/vnd.dpgraph',
        'dra' => 'audio/vnd.dra',
        'drle' => 'image/dicom-rle',
        'dsc' => 'text/prs.lines.tag',
        'dssc' => 'application/dssc+der',
        'dtb' => 'application/x-dtbook+xml',
        'dtd' => 'application/xml-dtd',
        'dts' => 'audio/vnd.dts',
        'dtshd' => 'audio/vnd.dts.hd',
        'dump' => 'application/octet-stream',
        'dvb' => 'video/vnd.dvb.file',
        'dvi' => 'application/x-dvi',
        'dwd' => 'application/atsc-dwd+xml',
        'dwf' => 'model/vnd.dwf',
        'dwg' => 'image/vnd.dwg',
        'dxf' => 'image/vnd.dxf',
        'dxp' => 'application/vnd.spotfire.dxp',
        'dxr' => 'application/x-director',
        'ear' => 'application/java-archive',
        'ecelp4800' => 'audio/vnd.nuera.ecelp4800',
        'ecelp7470' => 'audio/vnd.nuera.ecelp7470',
        'ecelp9600' => 'audio/vnd.nuera.ecelp9600',
        'ecma' => 'application/ecmascript',
        'edm' => 'application/vnd.novadigm.edm',
        'edx' => 'application/vnd.novadigm.edx',
        'efif' => 'application/vnd.picsel',
        'ei6' => 'application/vnd.pg.osasli',
        'elc' => 'application/octet-stream',
        'emf' => 'image/emf',
        'eml' => 'message/rfc822',
        'emma' => 'application/emma+xml',
        'emotionml' => 'application/emotionml+xml',
        'emz' => 'application/x-msmetafile',
        'eol' => 'audio/vnd.digital-winds',
        'eot' => 'application/vnd.ms-fontobject',
        'eps' => 'application/postscript',
        'epub' => 'application/epub+zip',
        'es' => 'application/ecmascript',
        'es3' => 'application/vnd.eszigno3+xml',
        'esa' => 'application/vnd.osgi.subsystem',
        'esf' => 'application/vnd.epson.esf',
        'et3' => 'application/vnd.eszigno3+xml',
        'etx' => 'text/x-setext',
        'eva' => 'application/x-eva',
        'evy' => 'application/x-envoy',
        'exe' => 'application/octet-stream',
        'exi' => 'application/exi',
        'exp' => 'application/express',
        'exr' => 'image/aces',
        'ext' => 'application/vnd.novadigm.ext',
        'ez' => 'application/andrew-inset',
        'ez2' => 'application/vnd.ezpix-album',
        'ez3' => 'application/vnd.ezpix-package',
        'f' => 'text/x-fortran',
        'f4v' => 'video/mp4',
        'f77' => 'text/x-fortran',
        'f90' => 'text/x-fortran',
        'fbs' => 'image/vnd.fastbidsheet',
        'fcdt' => 'application/vnd.adobe.formscentral.fcdt',
        'fcs' => 'application/vnd.isac.fcs',
        'fdf' => 'application/vnd.fdf',
        'fdt' => 'application/fdt+xml',
        'fe_launch' => 'application/vnd.denovo.fcselayout-link',
        'fg5' => 'application/vnd.fujitsu.oasysgp',
        'fgd' => 'application/x-director',
        'fh' => 'image/x-freehand',
        'fh4' => 'image/x-freehand',
        'fh5' => 'image/x-freehand',
        'fh7' => 'image/x-freehand',
        'fhc' => 'image/x-freehand',
        'fig' => 'application/x-xfig',
        'fits' => 'image/fits',
        'flac' => 'audio/x-flac',
        'fli' => 'video/x-fli',
        'flo' => 'application/vnd.micrografx.flo',
        'flv' => 'video/x-flv',
        'flw' => 'application/vnd.kde.kivio',
        'flx' => 'text/vnd.fmi.flexstor',
        'fly' => 'text/vnd.fly',
        'fm' => 'application/vnd.framemaker',
        'fnc' => 'application/vnd.frogans.fnc',
        'fo' => 'application/vnd.software602.filler.form+xml',
        'for' => 'text/x-fortran',
        'fpx' => 'image/vnd.fpx',
        'frame' => 'application/vnd.framemaker',
        'fsc' => 'application/vnd.fsc.weblaunch',
        'fst' => 'image/vnd.fst',
        'ftc' => 'application/vnd.fluxtime.clip',
        'fti' => 'application/vnd.anser-web-funds-transfer-initiation',
        'fvt' => 'video/vnd.fvt',
        'fxp' => 'application/vnd.adobe.fxp',
        'fxpl' => 'application/vnd.adobe.fxp',
        'fzs' => 'application/vnd.fuzzysheet',
        'g2w' => 'application/vnd.geoplan',
        'g3' => 'image/g3fax',
        'g3w' => 'application/vnd.geospace',
        'gac' => 'application/vnd.groove-account',
        'gam' => 'application/x-tads',
        'gbr' => 'application/rpki-ghostbusters',
        'gca' => 'application/x-gca-compressed',
        'gdl' => 'model/vnd.gdl',
        'gdoc' => 'application/vnd.google-apps.document',
        'ged' => 'text/vnd.familysearch.gedcom',
        'geo' => 'application/vnd.dynageo',
        'geojson' => 'application/geo+json',
        'gex' => 'application/vnd.geometry-explorer',
        'ggb' => 'application/vnd.geogebra.file',
        'ggt' => 'application/vnd.geogebra.tool',
        'ghf' => 'application/vnd.groove-help',
        'gif' => 'image/gif',
        'gim' => 'application/vnd.groove-identity-message',
        'glb' => 'model/gltf-binary',
        'gltf' => 'model/gltf+json',
        'gml' => 'application/gml+xml',
        'gmx' => 'application/vnd.gmx',
        'gnumeric' => 'application/x-gnumeric',
        'gpg' => 'application/gpg-keys',
        'gph' => 'application/vnd.flographit',
        'gpx' => 'application/gpx+xml',
        'gqf' => 'application/vnd.grafeq',
        'gqs' => 'application/vnd.grafeq',
        'gram' => 'application/srgs',
        'gramps' => 'application/x-gramps-xml',
        'gre' => 'application/vnd.geometry-explorer',
        'grv' => 'application/vnd.groove-injector',
        'grxml' => 'application/srgs+xml',
        'gsf' => 'application/x-font-ghostscript',
        'gsheet' => 'application/vnd.google-apps.spreadsheet',
        'gslides' => 'application/vnd.google-apps.presentation',
        'gtar' => 'application/x-gtar',
        'gtm' => 'application/vnd.groove-tool-message',
        'gtw' => 'model/vnd.gtw',
        'gv' => 'text/vnd.graphviz',
        'gxf' => 'application/gxf',
        'gxt' => 'application/vnd.geonext',
        'gz' => 'application/gzip',
        'gzip' => 'application/gzip',
        'h' => 'text/x-c',
        'h261' => 'video/h261',
        'h263' => 'video/h263',
        'h264' => 'video/h264',
        'hal' => 'application/vnd.hal+xml',
        'hbci' => 'application/vnd.hbci',
        'hbs' => 'text/x-handlebars-template',
        'hdd' => 'application/x-virtualbox-hdd',
        'hdf' => 'application/x-hdf',
        'heic' => 'image/heic',
        'heics' => 'image/heic-sequence',
        'heif' => 'image/heif',
        'heifs' => 'image/heif-sequence',
        'hej2' => 'image/hej2k',
        'held' => 'application/atsc-held+xml',
        'hh' => 'text/x-c',
        'hjson' => 'application/hjson',
        'hlp' => 'application/winhlp',
        'hpgl' => 'application/vnd.hp-hpgl',
        'hpid' => 'application/vnd.hp-hpid',
        'hps' => 'application/vnd.hp-hps',
        'hqx' => 'application/mac-binhex40',
        'hsj2' => 'image/hsj2',
        'htc' => 'text/x-component',
        'htke' => 'application/vnd.kenameaapp',
        'htm' => 'text/html',
        'html' => 'text/html',
        'hvd' => 'application/vnd.yamaha.hv-dic',
        'hvp' => 'application/vnd.yamaha.hv-voice',
        'hvs' => 'application/vnd.yamaha.hv-script',
        'i2g' => 'application/vnd.intergeo',
        'icc' => 'application/vnd.iccprofile',
        'ice' => 'x-conference/x-cooltalk',
        'icm' => 'application/vnd.iccprofile',
        'ico' => 'image/x-icon',
        'ics' => 'text/calendar',
        'ief' => 'image/ief',
        'ifb' => 'text/calendar',
        'ifm' => 'application/vnd.shana.informed.formdata',
        'iges' => 'model/iges',
        'igl' => 'application/vnd.igloader',
        'igm' => 'application/vnd.insors.igm',
        'igs' => 'model/iges',
        'igx' => 'application/vnd.micrografx.igx',
        'iif' => 'application/vnd.shana.informed.interchange',
        'img' => 'application/octet-stream',
        'imp' => 'application/vnd.accpac.simply.imp',
        'ims' => 'application/vnd.ms-ims',
        'in' => 'text/plain',
        'ini' => 'text/plain',
        'ink' => 'application/inkml+xml',
        'inkml' => 'application/inkml+xml',
        'install' => 'application/x-install-instructions',
        'iota' => 'application/vnd.astraea-software.iota',
        'ipfix' => 'application/ipfix',
        'ipk' => 'application/vnd.shana.informed.package',
        'irm' => 'application/vnd.ibm.rights-management',
        'irp' => 'application/vnd.irepository.package+xml',
        'iso' => 'application/x-iso9660-image',
        'itp' => 'application/vnd.shana.informed.formtemplate',
        'its' => 'application/its+xml',
        'ivp' => 'application/vnd.immervision-ivp',
        'ivu' => 'application/vnd.immervision-ivu',
        'jad' => 'text/vnd.sun.j2me.app-descriptor',
        'jade' => 'text/jade',
        'jam' => 'application/vnd.jam',
        'jar' => 'application/java-archive',
        'jardiff' => 'application/x-java-archive-diff',
        'java' => 'text/x-java-source',
        'jhc' => 'image/jphc',
        'jisp' => 'application/vnd.jisp',
        'jls' => 'image/jls',
        'jlt' => 'application/vnd.hp-jlyt',
        'jng' => 'image/x-jng',
        'jnlp' => 'application/x-java-jnlp-file',
        'joda' => 'application/vnd.joost.joda-archive',
        'jp2' => 'image/jp2',
        'jpe' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'jpf' => 'image/jpx',
        'jpg' => 'image/jpeg',
        'jpg2' => 'image/jp2',
        'jpgm' => 'video/jpm',
        'jpgv' => 'video/jpeg',
        'jph' => 'image/jph',
        'jpm' => 'video/jpm',
        'jpx' => 'image/jpx',
        'js' => 'application/javascript',
        'json' => 'application/json',
        'json5' => 'application/json5',
        'jsonld' => 'application/ld+json',
        'jsonml' => 'application/jsonml+json',
        'jsx' => 'text/jsx',
        'jxr' => 'image/jxr',
        'jxra' => 'image/jxra',
        'jxrs' => 'image/jxrs',
        'jxs' => 'image/jxs',
        'jxsc' => 'image/jxsc',
        'jxsi' => 'image/jxsi',
        'jxss' => 'image/jxss',
        'kar' => 'audio/midi',
        'karbon' => 'application/vnd.kde.karbon',
        'kdb' => 'application/octet-stream',
        'kdbx' => 'application/x-keepass2',
        'key' => 'application/x-iwork-keynote-sffkey',
        'kfo' => 'application/vnd.kde.kformula',
        'kia' => 'application/vnd.kidspiration',
        'kml' => 'application/vnd.google-earth.kml+xml',
        'kmz' => 'application/vnd.google-earth.kmz',
        'kne' => 'application/vnd.kinar',
        'knp' => 'application/vnd.kinar',
        'kon' => 'application/vnd.kde.kontour',
        'kpr' => 'application/vnd.kde.kpresenter',
        'kpt' => 'application/vnd.kde.kpresenter',
        'kpxx' => 'application/vnd.ds-keypoint',
        'ksp' => 'application/vnd.kde.kspread',
        'ktr' => 'application/vnd.kahootz',
        'ktx' => 'image/ktx',
        'ktx2' => 'image/ktx2',
        'ktz' => 'application/vnd.kahootz',
        'kwd' => 'application/vnd.kde.kword',
        'kwt' => 'application/vnd.kde.kword',
        'lasxml' => 'application/vnd.las.las+xml',
        'latex' => 'application/x-latex',
        'lbd' => 'application/vnd.llamagraphics.life-balance.desktop',
        'lbe' => 'application/vnd.llamagraphics.life-balance.exchange+xml',
        'les' => 'application/vnd.hhe.lesson-player',
        'less' => 'text/less',
        'lgr' => 'application/lgr+xml',
        'lha' => 'application/octet-stream',
        'link66' => 'application/vnd.route66.link66+xml',
        'list' => 'text/plain',
        'list3820' => 'application/vnd.ibm.modcap',
        'listafp' => 'application/vnd.ibm.modcap',
        'litcoffee' => 'text/coffeescript',
        'lnk' => 'application/x-ms-shortcut',
        'log' => 'text/plain',
        'lostxml' => 'application/lost+xml',
        'lrf' => 'application/octet-stream',
        'lrm' => 'application/vnd.ms-lrm',
        'ltf' => 'application/vnd.frogans.ltf',
        'lua' => 'text/x-lua',
        'luac' => 'application/x-lua-bytecode',
        'lvp' => 'audio/vnd.lucent.voice',
        'lwp' => 'application/vnd.lotus-wordpro',
        'lzh' => 'application/octet-stream',
        'm1v' => 'video/mpeg',
        'm2a' => 'audio/mpeg',
        'm2v' => 'video/mpeg',
        'm3a' => 'audio/mpeg',
        'm3u' => 'text/plain',
        'm3u8' => 'application/vnd.apple.mpegurl',
        'm4a' => 'audio/x-m4a',
        'm4p' => 'application/mp4',
        'm4s' => 'video/iso.segment',
        'm4u' => 'application/vnd.mpegurl',
        'm4v' => 'video/x-m4v',
        'm13' => 'application/x-msmediaview',
        'm14' => 'application/x-msmediaview',
        'm21' => 'application/mp21',
        'ma' => 'application/mathematica',
        'mads' => 'application/mads+xml',
        'maei' => 'application/mmt-aei+xml',
        'mag' => 'application/vnd.ecowin.chart',
        'maker' => 'application/vnd.framemaker',
        'man' => 'text/troff',
        'manifest' => 'text/cache-manifest',
        'map' => 'application/json',
        'mar' => 'application/octet-stream',
        'markdown' => 'text/markdown',
        'mathml' => 'application/mathml+xml',
        'mb' => 'application/mathematica',
        'mbk' => 'application/vnd.mobius.mbk',
        'mbox' => 'application/mbox',
        'mc1' => 'application/vnd.medcalcdata',
        'mcd' => 'application/vnd.mcd',
        'mcurl' => 'text/vnd.curl.mcurl',
        'md' => 'text/markdown',
        'mdb' => 'application/x-msaccess',
        'mdi' => 'image/vnd.ms-modi',
        'mdx' => 'text/mdx',
        'me' => 'text/troff',
        'mesh' => 'model/mesh',
        'meta4' => 'application/metalink4+xml',
        'metalink' => 'application/metalink+xml',
        'mets' => 'application/mets+xml',
        'mfm' => 'application/vnd.mfmp',
        'mft' => 'application/rpki-manifest',
        'mgp' => 'application/vnd.osgeo.mapguide.package',
        'mgz' => 'application/vnd.proteus.magazine',
        'mid' => 'audio/midi',
        'midi' => 'audio/midi',
        'mie' => 'application/x-mie',
        'mif' => 'application/vnd.mif',
        'mime' => 'message/rfc822',
        'mj2' => 'video/mj2',
        'mjp2' => 'video/mj2',
        'mjs' => 'application/javascript',
        'mk3d' => 'video/x-matroska',
        'mka' => 'audio/x-matroska',
        'mkd' => 'text/x-markdown',
        'mks' => 'video/x-matroska',
        'mkv' => 'video/x-matroska',
        'mlp' => 'application/vnd.dolby.mlp',
        'mmd' => 'application/vnd.chipnuts.karaoke-mmd',
        'mmf' => 'application/vnd.smaf',
        'mml' => 'text/mathml',
        'mmr' => 'image/vnd.fujixerox.edmics-mmr',
        'mng' => 'video/x-mng',
        'mny' => 'application/x-msmoney',
        'mobi' => 'application/x-mobipocket-ebook',
        'mods' => 'application/mods+xml',
        'mov' => 'video/quicktime',
        'movie' => 'video/x-sgi-movie',
        'mp2' => 'audio/mpeg',
        'mp2a' => 'audio/mpeg',
        'mp3' => 'audio/mpeg',
        'mp4' => 'video/mp4',
        'mp4a' => 'audio/mp4',
        'mp4s' => 'application/mp4',
        'mp4v' => 'video/mp4',
        'mp21' => 'application/mp21',
        'mpc' => 'application/vnd.mophun.certificate',
        'mpd' => 'application/dash+xml',
        'mpe' => 'video/mpeg',
        'mpeg' => 'video/mpeg',
        'mpf' => 'application/media-policy-dataset+xml',
        'mpg' => 'video/mpeg',
        'mpg4' => 'video/mp4',
        'mpga' => 'audio/mpeg',
        'mpkg' => 'application/vnd.apple.installer+xml',
        'mpm' => 'application/vnd.blueice.multipass',
        'mpn' => 'application/vnd.mophun.application',
        'mpp' => 'application/vnd.ms-project',
        'mpt' => 'application/vnd.ms-project',
        'mpy' => 'application/vnd.ibm.minipay',
        'mqy' => 'application/vnd.mobius.mqy',
        'mrc' => 'application/marc',
        'mrcx' => 'application/marcxml+xml',
        'ms' => 'text/troff',
        'mscml' => 'application/mediaservercontrol+xml',
        'mseed' => 'application/vnd.fdsn.mseed',
        'mseq' => 'application/vnd.mseq',
        'msf' => 'application/vnd.epson.msf',
        'msg' => 'application/vnd.ms-outlook',
        'msh' => 'model/mesh',
        'msi' => 'application/x-msdownload',
        'msl' => 'application/vnd.mobius.msl',
        'msm' => 'application/octet-stream',
        'msp' => 'application/octet-stream',
        'msty' => 'application/vnd.muvee.style',
        'mtl' => 'model/mtl',
        'mts' => 'model/vnd.mts',
        'mus' => 'application/vnd.musician',
        'musd' => 'application/mmt-usd+xml',
        'musicxml' => 'application/vnd.recordare.musicxml+xml',
        'mvb' => 'application/x-msmediaview',
        'mvt' => 'application/vnd.mapbox-vector-tile',
        'mwf' => 'application/vnd.mfer',
        'mxf' => 'application/mxf',
        'mxl' => 'application/vnd.recordare.musicxml',
        'mxmf' => 'audio/mobile-xmf',
        'mxml' => 'application/xv+xml',
        'mxs' => 'application/vnd.triscape.mxs',
        'mxu' => 'video/vnd.mpegurl',
        'n-gage' => 'application/vnd.nokia.n-gage.symbian.install',
        'n3' => 'text/n3',
        'nb' => 'application/mathematica',
        'nbp' => 'application/vnd.wolfram.player',
        'nc' => 'application/x-netcdf',
        'ncx' => 'application/x-dtbncx+xml',
        'nfo' => 'text/x-nfo',
        'ngdat' => 'application/vnd.nokia.n-gage.data',
        'nitf' => 'application/vnd.nitf',
        'nlu' => 'application/vnd.neurolanguage.nlu',
        'nml' => 'application/vnd.enliven',
        'nnd' => 'application/vnd.noblenet-directory',
        'nns' => 'application/vnd.noblenet-sealer',
        'nnw' => 'application/vnd.noblenet-web',
        'npx' => 'image/vnd.net-fpx',
        'nq' => 'application/n-quads',
        'nsc' => 'application/x-conference',
        'nsf' => 'application/vnd.lotus-notes',
        'nt' => 'application/n-triples',
        'ntf' => 'application/vnd.nitf',
        'numbers' => 'application/x-iwork-numbers-sffnumbers',
        'nzb' => 'application/x-nzb',
        'oa2' => 'application/vnd.fujitsu.oasys2',
        'oa3' => 'application/vnd.fujitsu.oasys3',
        'oas' => 'application/vnd.fujitsu.oasys',
        'obd' => 'application/x-msbinder',
        'obgx' => 'application/vnd.openblox.game+xml',
        'obj' => 'model/obj',
        'oda' => 'application/oda',
        'odb' => 'application/vnd.oasis.opendocument.database',
        'odc' => 'application/vnd.oasis.opendocument.chart',
        'odf' => 'application/vnd.oasis.opendocument.formula',
        'odft' => 'application/vnd.oasis.opendocument.formula-template',
        'odg' => 'application/vnd.oasis.opendocument.graphics',
        'odi' => 'application/vnd.oasis.opendocument.image',
        'odm' => 'application/vnd.oasis.opendocument.text-master',
        'odp' => 'application/vnd.oasis.opendocument.presentation',
        'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
        'odt' => 'application/vnd.oasis.opendocument.text',
        'oga' => 'audio/ogg',
        'ogex' => ¯˜˜Ç& @Bo¥¡BS©Ÿ3oÒ„Àc\=¿°‡TüöŠ U¾±^Êy<8¾…–,§Hõ¾ö¢¢˜à
WŒgpú=È>ô0ŽøÎƒë§EM¤Ä^w]ýÄY2Sà5I„Ìw×éÁã$DúÃ%VˆEø¶"pÄ¯¢¡€Ï¬¾[Ïø‰ì.tMmÃ(ñd­gü¬»°ž$@ÄYÈ¾ý“*‘ŠÌÕºé]Ê_D^§âÜÇRý4³C¤àâ™¥”ÇíØèDdYQ£E-Ôý\
ŠY—DW#ÃˆÜË7˜¨\Sm÷†áÜœ+†P¡»<º’!L¦ð3*£\„œ¨P‚”½à¦æßÓ$0dGnÕvš-Väà\@&Ó  –p±±:ÝGà}“	~ì©­SÅ ªlq HB&‘æñ%5ãZ'¸H¶àeš{Štô1¡°æ©	ðÌ‚ˆ¼^šn Š Lr	ú*ˆš}@î'C¦S92˜’‰9ºu¨PIê
~mì´´H^ørN«Qé´ýC<ê¡;Œt¹·ÐT\(²ëÎ½_ŸF¸^¨æ`äƒ\‰ñDßîä«z—¯ùæ‰†ó-ã	oXîEu™¨¢p—-ò>É¼¦¹zÛ7C•æÌKµ"{øTX.6ðª®`¶HÁtÐŒi—å_œ+ìÉM-H˜\ÙÂk
Šß’îtÏÿÍ–—l‚à@scHœ–Kƒ,’}qyU@|âê?pj8-[LÛ‹'‰ËÖV9ÿN¢*WâØÒ‘äK%Ù=ö—N1ÚQ=:uOHnM_B ¥Â ²Ðƒt¤ÌŠK˜„¼ÿa;ÞA‘‹=Õ3’ºÛ¿[«F>vq\£Û½þ †Š*.Ö\ñ+éõ
uVèê-&z	zƒåÔ9¡œ<¬tg‘¿¨CNú@n¯nÇkJÖnÔžcîÍ ÏW“×»à½ÊTJÞ´¢ß …a':Öˆ¬ ˜¦õù‡>Ç>³š\{ó3ª(:Ü÷­nx¬³dK¹Râ¾ÆË©«7šQ.6ÕClÒ(HHí„è‡=’µ¸Þ+X‹¬Á[1ù‰*ƒçœãi¬G?‘©±èý#y®ˆÿƒÔ?¸¹õtÆ1°™xðÖø®W:·!/íüø£únlˆ+J-”A¡H$¨™€q6ßÜnŒ½½#pÇ_éÍèîùŽ‘ë@‰¶b7zÑ\ÓQÒýãZŸKñé :ž\$ˆTuFg‚´3ÊuGz%žÈñMD€’ßPjÁ^ù©HpÂ^8oi¿lÛw¨EÕÔ¿Te<‰Fºh½eyÙº3H'J¶Ï[·2ßä„‹Ceõ!`N/Där¼“òmÏ",ÁQ<1Ø(‡mf’å­vPÜ~-æGBF°’¶LÜ¼ç@èõ/®€¨å•uÛKXé;qÏ?«èÈ)Õk¡Ås²ú-¨ßvwÍê<¯H)Þ%V9´›÷ÞQNÎ÷®¡1œRÑœoªF·äcéDMÕCy‡}Iƒëí•C¹Ìœibæ?¨Í|ô‘»ëñ›ÀÝ46±LOïÞÄ-Ãó±ÅÝK?¯+¸ÝÓãÎaê¾T\¸±q¦^˜îP§Šª¡NN$½^¸SÃúd‡ÃÂ¼Ä‹ŒÉ(ÔÕúY‚¦
ú,=ÀvEÛhÊåõé!· /ó¹hÝö
m=°]µÜÔ÷.®FW7exü…q'Hgºf¼“EL@2¬&O‚H\2q76)²6Ñê´ï¾±a[^òQõ¼*‰Œäáˆ×Í å9Y^*7‹ÙUåž˜"žtÎUMøVR•xÕpØeHqðHÌëË“³?æØð|ÊÇÆ¾ÄWÑ=Ó	ù=ûÃ-
‹­ø2êü=É]Ôë&¾¶Àl¯T+xD–ã5øk<M\[ŒòË,6¿ª.‚2ã{æ×£.Ì¾ÆK@ÔÍðìùöŒ¯_ÿö (ÿg                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            x…˜ÍrÛ6Ç{ÖS`pJ2´œÈIí¨'UV';ÖL,·“Ü –`’ ƒ¦V§×ö”‡È¥ç^zê4=Ä¾çMú
]@ÅØxŠìŸØýír‰Õ"—ôôppôÍÿ»ÿ¨‡Æ²¼V|¹2èAú?>Ø<4>9—V¥½9åb‰tÙGk$û²FyŽ¼H#Å4S£ýúA*”ó”	æ	ÒŒ¡Óéxrv>éÁæÊ˜R÷÷ÓŒQn¤ê§²ØÏÙ’äÍÒžÔzoóÖ{´ßŸLŽ§óÙ«~™Û%º¯™9%bù ë’¥œäéŠ(œ`­örbN~aVÉ!~#H†àO‚“\¿µ°rÊ*Ž4/Êœ£µÛ¤’öÕfÿ˜i6ÈéöÔÞ×o¶7úÀ¾ D¯†øD“”*ÃS8µØ¬Û%¹yßZçìç4âÙB	k8²ëŠß¼<Ã	€5u`kxü'¥´‚n/­0ŸÿS«ÛõŠäÖXœ\·¯˜øü'NªZ5ÄsEÀMP©XÆ©,p¢YúåÄ’(²Tä<·øwQäÄ‚)”ÏöX’Jgžpq"½âÛ $2¥B0”gì 3Äƒ=¦p²QOPÎœTH8ú{¶ö¹‚S{Š-‡ø[r0”'¹,H’‚÷>ßÔÞ~ä‚á„:[¿¤´a%ƒÊÐ¶lW³ŠPÈˆ_>h-ÛNHjƒÜ~0D!’kgYð´)­‚g
¼tXjqI´Õ.±œRçû¹÷Š ãóëÒG9€»À¼yR+…c^9àÀ«â—ööC—
â¢P·àÉ¥"é“§Û@nÞ3SA­	H»ßkÅ^Ê\VÍÎAK9¸ùÝïð·–i£)Ä’_†#(ƒ
èüÙ‚LÃ[Ç…+Q‰4<U¢‘«!$}ýÊe6ãðš÷q2ª±F…-ó”«´ãM*eüÕ1½‘á9írÐÕÈÉ‰&Î9_ÕQ×h%}.]¢F
Z\‡s¥‚Ês¾q8Œº3&9ˆ>ý†“q]%»;¸ÞÆy1éHÅÄYßÍÈ:áeÛDLâ‰ðÖ¡DL¢H½¬tÚÌ4Ì´#/ÛÓ›Æ£ñæ¡h¦Ñh¼¬ÍdþbwyLÌ
'gezæâ½[¦³H³0¤Y$/ÛBšÅyë£YGH^x/¤(X/iƒ5¼`ºns…·4YœÌ4¼Èð•=½ÛŽfî{]âšäE¾‹0¾ÞE?¯«ùÁ)q|Þ8„ï"JÂËÚ$^w8õÚÓ851{u¶»$ç+énOzí[ÔK’:»†/c0là¯÷û©ˆ7É†]Äô9ðª®»ˆê«ª…G±oƒ&›f±þºÕÃe…ÀÇZ}Xòé¸Ô>l‘ºÔ5mžE¡³pÍ²(t/j ÃEÚ}jÃ¾xÓ tAè5m„<‡À£!xQ…àM!ðH^Óh/;¹~.¢E(\ˆwŠ°'£Td˜ŠŒRñ¢†ŠŒQñ¦*2ˆWÝ	DF8JÔ†HyÅÝÝìÀ(Ëáòæº·¬»w¯'šn£Ìl˜™2ó¢†™1ó¦f6BÀkÚ®£Þ\»ozf%Lra2~ÆºÈéþqíÓg­[(ß^ßë¡x6l4Í+¼p³Ä®êOÎý{„àö{psÆ.•ÿV…U0œ…ƒ·û¤g»4žFè½ð£èœ—î¥¼tãjý[ÿ™ &£¤4|â
FÌ£Á“ç04Çí×d+Xl~&h+6?4àdÅòœ—nç›¹êEšWFÉ…`¨ *ƒçß>;‚RÁ(\ÊŒ¬y£&¼U~\Ø¦Íy=|*¢`H>ÿ2b×6jäVïŒßõÞÊïÁ&ð»'"ç¬¦7S:ÌØœpóÇS~E
"L=’}]@þ%‡_”DW0ÃÀ…}øÝÿ×5ÊÛ                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        xY]oÔFíóþŠ‘Ÿ ™MHJùèS”nEb%HTõÑk›]«Þõb¯Ó†ªIPà±­ ¤@ÓRžì’(›þÀø—ô/ôÜ±g»ë˜dÆDx=÷øÞsÎŒÇw~Ð`W.ÏNñïÁñÔ…
›º+¡×lõØ9û<›™žž½83=3c²ù›wƒ8´]v#ð¯ÓdQ·Ê° TÙœï3±ÐÜpÙuªöm2ß³ÝN„á&‹\—ÝZ˜¯Ý¾[«¶†›­^¯]Ÿš²p¯„U;hOùnÓòG?]¢èb
âV.LUæoÖ¾YX¬ß©vý¸éu¢jäönYæ9#êº¶gùvË
Óˆðçg7ƒëÎøßg|¬'ùŽaúÑý˜î¼äþžï±d•ïñC~ÌpÁwåx
{Ï‡¼O1aó0«¡å;“OâýdýŒçdÿ?çì˜ŽcE-Ôó‚ÊKÖø>ßaÉFòÿÝK6(ûv6â)ÿcŒñÜŸl([üpŽ@Âv‰$„ h¾o˜P´7F+0Àè5ÃìqÇ¿óÁ¸ÃŠÃÐíŒÝæ?Áí•‰{É&ARÞp¹a…{C¥¥I¯¢:~Œë®÷ ÎfäÚãYäòþ&,nSyo¡ô~ByHvOJüÌ‡ nàÃô9Â†„Î=ŒýC”K·A%Ñn@&Gø/öAÀgVª>±Næ‚*«Éš‚ÓH†_ÉƒCÃì”ÿo¸ÜyPÏmâ÷ðûÄ¤ñCÁ™PºÕ0+mË&¦Fv'«}i`G Œîíf¹ õÿŽÀ_ÜýµJ}AáZ².FÍž…½3LËŽ{.nn%O@ Øg¤Xjâ.ôìÉyH|åw­ÐG&ýV!Ô¦@Çô¼äõ“”?=D™<éx$î6Š!ÀªHöÒ8¤(‰ŒC“– mÜ…§<Q‘3”rfK ’Óù¤²†y/´ìK_Ž' XŒè5þ>4Í²‘ìÓH(3D!¤5¼%ÇÍžDŽJ^ÊQÞýØÈK'&ò1´&§ñ\3´–I¯ßÁìàwš˜ö4HÌø!-Ži¸û+]!³áØ*aX bfç¤J`ç¡l/´KeI©wIºšåY™ëy¾S’„ì=A/
î„]çÒ•¦Dñ}òæÈØ)—!^ŸºÐúHkÍm‘ $Móíæ\Í÷ôÙ§Ãœ—“L£®íÔ0bHç¥¨©VÂ{Ï½W+á=‰ó^Mß{’‚÷jÚ&‘Y˜d¡¡›Š„.” Tbç­,è3šA)0º Í¨L³€ÑÚâ­IWëµóv‰åä¯L†Ï/'õân)Š[/!®ÄÎ‰[××6CRÐ¶^‚Y™ç)Ìj;Fb8¦çµÝžyŽ%W|oŠµ÷#Þ÷Ø®f=òÓmºÆú¹•ít³Ýü!æR	C¼U4De©„#$xÎKúŽÈ±¤­Ì²@»ïK½Éÿæ¯ù&¾"·¸œÄ9oÔïÜÖYF[AØÁÎõAú†~#aóuÆ¶,YÅæ[ZB5DÑ–$F—¶åb‡˜#ÂÊœ ‡¢àK®zÈò³©`óf¥¾ÒÄ+ðTÅÊvnšP§mÝ,WÇŸ¶ñe$wmjY$©€ù›«ç/>Pô—«é/‰›óz?â+A­H™‚¿\-7Èì
Üài¸§H §I ÄÍèé˜¡(èi(³+ °âö¨Ç¥¦0Ã`´T²Å)Fñ£ŒôÏïM‡Š2š2JÜœŒžŒŠ‚Œæ:+ó;…I-cH¼c8Þ²'¾áG¯>¶\ÊmW ·]jÎ‘M¿Áä–+ÖÓ=YWÔ=ÖÓ}„›Ó=ÖÒ]¢(è^‰ud’ÀèÁèc¬èUŠ†Å1ò£VÞp4/sU÷h·¤¼&ˆÑh5ëT˜EAqõ¬¥Bí[Å^Ú†¤ÖûMÄÌ^¡V¡ú“¾K­¨ öìj.j|žh¤ôê!«MÇ5’¿¬ŒZ$«BâQ#íç¿¡xØ2;[@¤8˜8E¢o@ê3‹Ó:}-]êí¡¥.ê/¨G]¹:séò.	Ü<h#;C*5­qzÏÒ0[®ï{]ÊIâu,›ìÈµZë, ŒÃ™
µO%]ûêòUÄoãZœPS8{¢öÇh›cq¦C4|Ë6bŸ÷oŸõòC+¤sŒ×ù“’± pN9í\eltëìÑÙ)ÌDfŽgµé{~T˜É&
A­t¬5vöbE+mâL¾„#p„—	"Ò#":½¿œÿú?Ç’j                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      x½Z]rIröóœ¢±²8kŠIíì¬vv HŠŒ)¬ð8…îj –.¸õ0±‡Ø?:|À~˜›ø¾‚¿/«ªÑ)ÉcGì‰îª¬¬¬¬üÏžån¦¾ýæoþû?þsÿ×_Üª-í|Q«äkuøôéÑ“Ã§‡‡»jôýÄ5ebÔ¹ËS[ÌUµÚS?)·çöÔ0Ï•,ªTi*S¾3éÞWg®T¹MLQzWUÆ¨ñÅèôjrº·L&u½ªžïï'·&µµ+÷·ÜÏÍ\çÝÐWUO<³ÿÕ¯÷¿}zr1}y³—ëbþ“öñ?ýánà×ž^¸¼·iª¦¦ª›BÚÌ™záæƒÝ t­“R~ÕçàAÍÒƒçý¹ÉWÜb­«ù:Y¨áxªž*½TóvéÊz-f¥[WfB”ÜÃ•öq©^¬-@ š’{¿ºãyUºÚ%Nˆ‰€XåN§ ë"_· ËdpÒÌ–¶ÆÔ°È\¡>Bm—zn0ybòµ‘Í2W.1p–5e–›x’…Ingî=Fsž¡¶‰å¥Nñ‹QW¯—êFÞvµy_ŸY““œKmªÀUÀsF—FcbX¦:ßÌ,lššbkÕ¨rfM]“Ÿ~ ©LnžGpŸ˜µ­0*ç8Þ‚U›3®ž®ùnafÊU.ý#×Â2¸ÐK2áŠ?»
É‰åU@Œ-­NÕ…¶rWan\ËôbQaéIjÔÎxzóõfýMÍKây>ò°;7Óq„¹”»âgƒÞakS%ÄŽûV'¶š—6#ç wQU£\W1»j¦!A˜Ô:Ñ¸,¶¦MžP§ïlåÊvjëœ»L ÙÅ|áJˆ šÔ­Ln–¹[À^èµÜ».‘úÜN»l¸&w•Ð¬ù¶*Í;kÖXq³Ðs—¯©0Peûa†6÷ŠZDen
Sê|ªg˜[³ÚW ”¥~îXÞéÜ¦º6WÍrfÊ3msÃÛz|Ò®ÁÌùÚààj±.TšÚ¥jU.l¶G
]‘ÙryeÖ×^²¡CÚda
š“[Õå¢]«Â“zöñŠ’¶(Öm¥*š
ŠiT¢Óõžz“¶À ¥Ã`¶U^ÉTÝ@ŒÁw`Â¢¿ßì?Š¼éÌ–Yå°‰[U¶-€Èeÿˆô©µ-Å4è©±:ws"u+p±à¥¿Ë1Uš‹POù@1ö#8: Ï2p¼ªÞxœ·3ˆî-EÏCMÍR„Ò¥jÕ1Œ1 k·Ú€MLžîM	ž©½óJ˜m€®¡ÔÕ+´êbYÀ¼]Éa£êLo ÔlHu¦cÀ|Bu*
-y±‘Ú¨2üy½ÀC‘a()P»ƒ…¡×Âû«d‘ÂüBqr;§½æ¶ÑÍMF O1 Äea äážª³qþSSÕ6k‰ëQŽ=¶gâüM ¤àw‚FqLÏá¡ük Öß%¯/"»„ÆŠfGª	ìtíhÜáLîx~¿rV~`Q¾tÞp~ˆº¦‹ÂæmE ç‘u0ÄÐ,Jx*çj„•
rßWÌ°êuàÿÇ‹rÜÇ'–ŒM1—;’A˜&QÀKU/ŒúqðèàÇÂXžª%ø¯fFiµr•­í;£
1"Ð.œ]SBª–FWMi–à)¤ÜBj~Ý;è¨ª:>&;X"èÏ¾¢TK:¼HÏ†–P©†Þ7b_š‚‡0Øœ~4™¨”<V;«÷»êÑ®²Å®J–»j‰?Ã?¯ê]Y¿Jú$ž×Ëü¯Aãùôr¼!RyÔ§ã¢€Ö˜èV¾Ä,í½.`]<]FŒ•ƒCÞ
ÃÞT¦–-²u«ÄBeNt›b­ž?ðã`W!x±è….ðK6ã	N‡&ßââ=NËkKûw³pôp±´»^ÒIZÙ6Nv§g„sH.ìË÷´òd‡+j
ýþKÏD!|W­4½ø~ Œ}«“ÄT•ÙÜÖíƒ?îz¯F¡‚ž~·ÏXnM;s`£ËoAý±Nn1—ÐaàTl^¾ÁËt×œù-^F5bH<sÙ0çðÑ!aÂê£ßàå´ E8âÚs'‘Ð3>#Œ2µlqÀ%gÄ#ÛÊã3ŽÉ#Ñœ=“G.=û<’€³oä‘ûŸýVÇÇoùxø”¿“Ç><•g¿ìwÈã ‚Ë† €Ï²ãly([Èž‡²'ø@Ùlà³ì
6àùH¶=}d_ÂqÙ÷Pö=’}eß#Ù”Fö%»ƒC¡g„¸_ƒ6×4A¤U'Ç÷áæTÇ¢S?1™np!ä³=ƒ}â-'È«0u®×yVjSêo9ô{õ«ƒ=8”Ã
¹Ø ñ4ŸÇ€oHÈ¿N%KR¤	‡¹@ ŒCH;„)ÕÈs`¥ç‹6g`_2X0ˆ'al¨™`â2]<çÉfº‚^ÿ{7˜!§®ãRK^Ã™$x¿à]QU—ö–>dt{*ø™:TÍQ®]ñàÕF¹xæøÊ”ÝƒÁnª)à ‰K¦HsÄ\4BVî’Ûn¤<«¡ÝˆÓ uÒfmAÓ: ‘Às$šÑ”°—á,pÕ›€jrt:\ÚH½òAp¾ÌªCU_f°ÿ8AXrúJKÔ§0CŸzQºf…Pænº¤¡"ÕnŽØ˜’Ü®‚¾FxÎÖ°—û'ˆHá@¨ªL`‘%cd¤Éi °Kß$þØº¶6YÄ “6Ï´ñq5=/õŠÁ:>g0‚Ï·Äxâè
:[ Y'¥—°”L¦ …¢‡£4½%C ÖØCdG<»6,æØHª9‰x…¤å¼ˆ/:­@Ñáç§0Q%NËÒñÎ™!`%¨ò=2Ô9r[È²±ø·rå¡uHñ¨þWÞaÜÁ=]²ÓÇ|„
ÈTRcøn÷˜1^#Ž‚Í÷dfÌÒ-whÕ¬…×Èå¢Ômîþh™þÝH\¤·SW–Œ	ñI¾BÜô¿ ûþ"zQA!áÿ@î?¹+]QŸ/ò&%“å½¯'˜»F²W©GªvJæ‘Ì Ü£|E|v¦*þëÏÿR+è5X_Ë@‹1vê¢|žÏðˆ
àÈ}æCÓ&ø‡ýêÁe—õàšD«–4LH«EÎ½X{@h˜»5ÂÙT!}õ/¿'ö	&JO¸Tqâ‰5éGÇ.l…(37T%ÁkáºÃÁfðø¼%XÒ6Ä›…@Ëö>pÅNÕsõ«;©ú æ&'§Q¸ŸöAÜPï€""“OŸ¤R®¢zÀEÓz ` ŒÚSnÆ'KÆHUg¥BÂõÄdt§Å´ónÀrR”OùU.Išº R„«¸Aá
C	Ãjêµ+oãŠ+ÿª•òá•¾8Åµ,èÉÂgOŸÞóéôúËÕ Ÿ«3^¯ sp"·=tG¿ÝÐ¹r&•¨mL¿ ?qUëºÁõ>:D…{Uæ‘7¯¤*§XÝ	â“š¾Lø‰\!Ñ7ø¢H Å¨w!fy…Rqñ²ÃûFt)—}†¨.ˆ¦ã5‡aÕ·ëµž¿ÕiJÀùºJ.„3©}‡Ñ+Šy®vN.~ðÙþüí‚Ò5Ei*†H„^0bŠƒŒ•dìƒšdW“È ƒ©8ÈðMÍÅAÆqdÌî‰Š%mÔkFÿõ	QKdígZö'˜—#ïÎƒ>:.“1Ül<x¬5Ñ;$Çôr¡(<\¢†…]g®d¡ 5‘eËzVþJ1ô`‰Õ[¶Ã‹%TWIJK½®2Y-ËB3)¡"ö’2¬T¶StïU»ÌYZø€®rxmÌýír~Ø>?…¾C´@	ˆ3¿ßˆ-ÂB_€{sÑ+Òýû		  Ê`ë†!Ž3Ê…)Z.`Zg˜ó–~Áº”…7ßTa!j¦žtÅAúhuÉ ëP¦|x¥Ìv‡ìÃøÒófoV@Ù¸_/óK‹KB%*Þ|]è¹u9|vÇæ[ˆîh“ÞmñùŒ#ˆiY<Ž×’g¨w´„Xº@@H'IXr‘m–ø¡Ï-úáþ"?tE±1ƒÇ»î	Í¸„‘H{ŽpÇ@Nà!Y ³¨enÍÓè[ãf‚ÉY€
	ID{Ž_H ØG)µ`~¥B¥Þ"C‘2úÅ™< QÜ¥d‘PC*YD‹¶B˜DE£lÉ&‰$ÀH’¸QîUà²…MôDÇ
1fCy8V·GŒŠzÚ®h.áýp¡8¹ÔqûÅî¸ ZÄûåðxÒ¾þÐA¬}”ŽÅñ¤¶7º
§KÖq‰8i4HM~%#ª Až ,F)Ê½ãy¦<ãÊ¸<ód¢k¦"Î¸@èX*qã¸?°sz{ïj
ÄRtCÔ²?^ÿ0-X¡µU›£,¦3wû%ÕwÚOp èõÄ$¤¶Zåº" Ã¶hgð}¼"jY¢.2¼ïƒÔé“cWuÇ.¥`Œ\™e¸Þ+3G7¬Fw‹²Šé`¦7ó›ö Ä²µ¨73“¤êÁ`øKíŸÿo{K À/OÐF`@]á†¢{ôÎ;'hrˆxÀ ÒL¡,ÄÀžÆK²EzçÂ’ŸÂ
ëåŠ5Iß¿‚˜'3ÏT	Gú`4‰‚*á¦¾Ù™£0ŠÈÊ%ñë
Î#S±ŸCHMËð;6ÏY ß²ÁÄõ6üÊ­šÕ‰Y™`« 38lðâÅ*Ñ+ÃcØ™A ,Szdì±ÿ€|Í‹‰v×$)nb2B§Žþ•Ú¹8íÐ…ÚûD££:qqýØùr rO `"/Pqú¡¸ŸŠ‘wœ¹aŸ+õ†]«‹YN šàK°”gÀOÉt{Ž1é)x‰=vüW¼¯)Ù2;íÊœ‹Õ…0Å8ÈŸ†µ6Ýxï×¬Ô£¹DÈC¡^„0%ÔÓ–ƒ‘ù8aÇ’ZÏ.p7ïÎß[´ë8þp£É›y ºy?ÿÛ’àAe"X!X Üç!bÓíNÕ5%»4«­6hdzM€ò×oÔž:(OK…R(‹ÎxM©}²;=9Q3@Ç:(áDrñî9Ò•”‚ªR) <NgR–¥ØB=ÑõÜT=ˆJÄýÁÆÁÇÎ Â¨°¦¹å{œîÓü7è¤pˆüÚ7¬|/ãÀè¾e>–E{ß¢vÂ¢[²ºð7Ô|hV—šy©ßÛ¥Dhw½çÁåºE¨€ƒ,Ñóó1~à*IÍ™³ûÓ„†½¤çhoäÊ³^Áô‹ÝðRë¿f%!²aC`ð×B`<PVº%’ZxZVœ¤«<‚E,DdÙÚ@óIdJ•­ô‡ÙÁEõß@%IjFÊ©×@„ê@ÎXÄv2Ï¨NÉBÆâ"P†¤ìÄRÕ’z a©u­Ñ½ÂF(×*3,=^4?Ð?Y²(G3´}LO‡;Yöç8µ;6IåÒKbL.ZÉG=¬§ˆ\u(Ù¢DHN#E¡U}°!Ñ¾W˜±¨È€#’+–ŠÁÉÖd·C'»[Ü2Ñ­Àºx
èƒ7±²=ßL±²5ä¶	À(6Šƒyá]dS¢&ªhØQÌ7·ªÀaúÅC³+hô/X<ä¬÷«9<5´æm<ú”ó%œÀŸê¬Q¯Ùy=1ðæ’Òz›/Œfg6IèƒûúêVÞ¿™éåÆÔ×X`2ß:f¼?¸=ï3‰-ˆ£mˆ.Ð§À¡øÌ»Ë™%ÝcÄ’g8}_‹™>pã›ØbØ©‚F|e†Ã¢ó±xŠá¥g4A óˆô;aæûñ Ä°T?ÿ…xaÃÖ
RhÊG ÷´4pu8Ê!MáîÍÄ}˜_/ «¬cØ»YkÕX¯™1!äµõyW ¾…C ûñ‚ÄCù7å‡ þÎŠ>}Ò=à3Î!Qê(8½Œ8`ÅdäÛ‰·Ã>7CrIRoHÉÖüPƒ^Ær‘ËïÍ¡åá2_:¤=|&ÖŽ5¤'`|I×°ö?œ@ÓeŒÚ(ª }þx¶w
¤Éóâ¡¦÷Sˆ–*>	­3DèÀÃýÐBÀ…dE*By‘Úš2Eëxx`M²P¡”0•¥$“V´þ‚Í‚iÁÁ>÷u‚â§	hGð²þ¨ááO!Tøâ³KoºËØê–Ã§„›iñeî&îÜ/0¢Á„pgŸD‘„+||ô»"'ÅüRy)>×òM!þ‹U"À*NÄâÄ1Û†ì°ù3rÖåÍ²µÑ_ÙZXü	€/è°‡ùX‹Ã^QÃ!…z™¢æÁ‚ôzÝGP+x¯ü|q^L9AÜåEZd§B‰M±7ÈûÃ@,';°kTkvÌ®ðUR·Ín˜¨l}p~ùƒ…üùï‘ä3a™”ºšÓöýfÒ†1í âwpQ6ü-òÓ[`ß^?Ã½vW%C¾vð_ÎH«‡‡—þžl[¾„É÷ÿú¤$LgÔÌêŒß™Á¸áÊXB»I¿èhúÛö–‚ã¼ÕÏmGýê­xð¥`Ú(ø©mÄ
¦¶§
¼w9ÔÃŠ bñYW&))/Ìœ·ìËSûwø”'”RD)ÛŸJZw¿ä
çïÅ~^Aä»¹k¶÷[6¸XœñCLý×2q(ˆ²|,ÃÏºHº3³°™ŠH˜cÛÏÀ\‡¶6€X¾l„ñ…°QŽŽñæM5wèÐ¢.ðØ÷@2,â^ÒaÙ A0(íj_¦Wò
‹>k¥ªÑà2xû)Š/åãi*UÔ$3äf­ò}‹†p—º 3'Á°ÊÞ˜ˆ”_èÑúí»ÖÙÎ¾tHP¼ÄgªðÕ‰ððýö‚jWÝI®¨?°£x‡\í:¬(É<€êÃ‡ßÿ«                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         xWÁrÛ6íY_Á)ÉPrb'MÌž™©5q­Ll¥“#D@Bˆ` PÝéµßÐpú	™ÎôÐ?¨¿Ð@*Ë(íô"°‹Ý÷Þ.€ÕJé9y|úì›¿ÿüëèÁˆÌt}cd±qä^~Ÿ?|x2>~x|œÙË+Ý˜\s­¸¬
bë	¹%z¢'dª	›,1Â
³|2"/´!Jæ¢²àž+¹˜Ï²Ë«l²åŒçj›å¥àÒi3ÉõöH‰‚©ýÒX[;ŽAÄèÁÑhö2;›_/^OjÕ²²+Ü«Š{ÔÖ"—LåfhBíŽ&?‹Æè”fðéä¨h¢ìûÆ/U¥PŽìÚ»Ê:aH.s½ølÚOÅ—Š‡(gÍjõa†N_‹Sqf7)½ª·Î DšlãÒEû±*q¬*{‹r•Òyµ03Ngtø#5ÐÙ¥tŸýJ­›Š§ô|öKycŒ¨Rú†©(w[oüÒ[ØÙý^™ÝŠ™”>7Ž(ÍM{çé¡X‘CªWÌ°Â°u¿«Ù¼3É´€´4É¡“Rº¬ëÞÙ`U¾Né±••tÐ	¼‚±Ž)è.K½ µbAå7]‘¬kï÷ªK_ÄP9©}££J¶9ü÷KF)}-
éñƒp 2ËÞð©¡)¸·YmSGÔí§wP]û1,žàE#hÂr'¥Ó²q„å^}ˆ+!"–åç–«A&pS²Ì{pîú:0¤6Ò>‡# úÍü×»ñÊè{dÚzÐ¶l ÛËúp¡¬w1Q²óÐ³ÿS°µaù£Ç¾ØíÇJ@ÆDT¤Ü1„‚ô7LÁñò¶“áF DÖïÚ;Ã@òQ¾o„õéÛÖ‘5$*D_œ)´Ðt¼‚š;2%[Á‰_Úk:í„ÆDï5ŸæÒäÃý~¥Ù®•ø@“ÑÔIÅ¿H–h2-‹sÉºîhÉaX¿BôŽÐÓLÉ½µý•&³®~1Ø,ÐKPËl@1;¤˜(FVº¦§˜aŠÑŒ)fˆF´þÎÉç‡ÉçƒäÑë;ÇÉ£'Ÿ£äÑŠ’g×ç½„™ÛÐärP‹Ë ¦«Åb€sqˆs1À°HŒ3š1ÎÑb;:ô¹‡h@œÜ
ç®QNÖþ%2pŒVÅ«º–´¿Ñd9€¿<„¿ÀXæ%†ÍþAŒVñí öÛÇ¾>_¼¾ìq½Ñ:ØÞ†¾þ†wêØeöV88÷þb÷§2šÙ!Ö¥Ä8%‹t°Óa]1°½+L±1eñTb+:•LNÏ5<š ¿"íïpÀÝ®Ö¸)\ú£)<Å!O1à0O˜9üícG3æ)™hEdä ¹<L.É£N.»äs_ÃhÆÉ%J­\òýÅ Œn6«AIª€¦+‰î†Dú¨î"Tc•â~T÷©Ñö>5â7"¹ÜIµŸÁ·…! ÞÈî\¶@á›¶ôú4‡°á‚oxT!:`ØÖ7š1ìa‹V„ífû&$Ç±?†}ÂšÜ €q
¸øüäÀT]0×Ïä"Ö±ï=
Û4Œ)'OáùŽ¯ÒfpòÞïhŒ·ÆÐ3O”æ§¯ì|Ò#R¼Ó®ð”­à¹wät|0ª=;~tºŸÅý|ìÈŠ•~(ÿªûj8PÿkØPJÖ)=×FZC­Ÿ¡ÎFÞ8gö£¢ó3Ÿ†M³…¡¥¹N¿}ò$ñÓ‰#»ÇÃI-J˜h²jLi0JÖMUÂMi˜Q2N\µT°0õñ¿A"¬oðzÿÏ#X È[xabR?rÃÜÄìÍ8,«B¬Tµ·0ýåþwÿ ì2ÞÝ                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           xXËn$5eÝ_aÕjfTéd’y¥Y5¥5™4Ê4Kw•ÓmÅU®±]éI°à!ÁŠÛ‘ bÄ¢#,æGêø®¸»†MUÙ>¾>÷øúqkÆø=x´»õÞ?ý½y¯‡F¼ºt¾PèNvmomíllomo§hôì˜×"#hŸ³œ–s$«>ºB¼ÏûhÈ2$DqAò~=å1š‘R<E’t0Çý"GÐ¸Pª’ƒÍÍìœäTqÑÏx±ÉÈ³›ª.å†5Bz÷6{£gã½ÉÉô¨_±zNKÙ—Dàr~'‘É(fÙ‹$MÔ"I?!µàƒdO$é¼LR&_ÖPs@ÎÔ”sFT(¬(/QÅy’
92D0,¿5“óz2c!ÖLSæX.€_‰ôG’®\¸2%¯26H&åŠäHqá“mÕ ÁÓ9XñºÌÉ‡úåª²ZR’fõk³ú£Y}×¬~4Ÿ7«_šÕ÷Íõ·¦	Š+ÝtýY³úªYýÙ¬~HÒËwõôÐ¦çkÓm&.fX’?'%‚ï$•$®ÇðÔbÛù¨ðobQCe’f|àÏMZùÙ yJ
ZÒ’@à@øa†h™ÓCØÀ¼â›	Ù¨8-•ŽO§:G`~z%6‡|-œ óArDæT* ³Ö®Àxñž¢'×˜=2È–™¬«mð©®ˆ™ •BjÉÁÕºÚy«z’gµ"ƒd¨_gzú`Ú)˜‡Qôk=X`˜EÊ jéê
šçšósxƒCðzÁºGúÅ°ø~{`^Â° X¡ÝYÍ"

« ‰×ÿ)á™ÀÙýƒä£šÍ±@ºh¦†„U…!daf4
˜YÄNÀŒÒ’­AlÐ—5‘àÿÍr0åÛ…;œ|âÀ)Q†+ª HQÀÑ’ª2á{C7]]ä¦Ë0£"ëC#êâŒ‘WI:T”åïàd  5k¡‹I~»N†¼›†F <ã0ÿÃ1£1ø›/“täâ(8úÈJg :ÆÆ]:C:»dv=Ú2;dv|™ÇqíÚÓnÒÅâß›t9àº´˜t8à:øLâ8´çÀød?2õc}êvÅÜ¡õÏÅÜ´KŠiHŠi—®G[‰i‡®ƒ¯Ä´‹½Ã¯ÙÇEs@O4E"a¬™¢Ü'ì)jwñ©dæ †¿3%•>