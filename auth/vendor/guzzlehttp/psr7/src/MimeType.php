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
        'ogex' => ����& @B�o��BS��3o҄�c\=���T��� U��^�y<8���,�H�������
W�gp�=�>�0�����EM��^w]��Y2S�5I��w����$D��%V�E��"pį������[����.tMm�(�d�g�����$@�YȾ���*������]�_D^����R��4�C��♥�����Dd��YQ�E-��\
�Y�DW#È��7��\Sm���ܜ+�P��<��!L��3*�\����P�������$0dGn�v�-V��\@&Ӡ �p��:�G�}�	~쩭SŠ�lq�HB&���%5�Z'�H��e�{�t
~m촴H^�rN�Q���C<�;�t���T\�(��ν_��F�^��`�\��D���z���扆��-�	oX�Eu���p��-�>����z�7C���K�"{�TX.�6�`�H�tЌi��_�+��M-H�\��k
�ߒ�
uV��-&z	z���9��<�tg���CN�@�n�n�kJ�n�Ԟc�� ϏW�׻��TJ޴�ߠ�a':ֈ� �����>�>��\{�3�(:���nx��dK�R��˩�7�Q.6�Cl��(HH��=����+X���[�1���*����i�G�?�����#y������?���t�1��x�����W:�!/�����nl�+J-�A�H$���q6��n���#p�_��������@��b7z�\�Q���Z�K�� :�\$�TuFg��3�uGz%���MD���Pj�^��Hp�^8oi�l�w�E���Te<�F�h�eyٺ3H'J��[
�,=��vE�h����!� /�h��
m=�]����.�F�W7ex��q'Hg�f��EL@2�&O��H\2q76)�6��ﾱa[^�Q
���2��=�]��&���l�T+x
]@��x�����r��"���pp�������Ʋ�V|�2�A�
�tXjqI��.��R����� ����G9����yR+�c^9������C�
�P��ɥ"铧�@n�3SA�	H��k�^�\V��AK9�����i�)Ē_�#(�
��قL�[ǅ+Q�4<U���!$}��e6���q2��F�-󔫴�M*e��1���9�r���ɉ&�9_�Q�h%}.]�F
Z\�s���s�q8��3&9��>���q]%�;���y1�H��Y���:�e�DL��֡DL�H���t��4̴#/�ӛƣ��h��h���d�bwyL�
'gez��[��H�0�Y$/�B��y��YGH^x/�(X/i�5�`�ns���4Y��4���=�ێf�{]��E��0��E?����)q|�8��"J���$^w8���851{u��$�+�nOz�[�K�:��/c
F̣���04���d+Xl~&h+6?4�d��n盹�E�WFɅ`� *����>;��R�(\ʌ�y�&�U~\���y=|*�`H>�2b�6j�V��������&��'"��7S:�؜p��S~E
"L=�}]@�%�_�DW0���}����5��                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        x�Y]o�F������ �MHJ��S�nEb%HT��k�]���b�ӆ�IP౭��@�R��(������/�ܱg��d�Dx=���sΌ�w~�`W.�N����ԅ
��+��l��9�<�����83=3c���w�8�]v#���dQ����Tٜ�3�Ѝ�p�u��m2߳�N��&�\��Z��ݾ[�����^�]���p��U;hO�n��G?]��b
�V.LU�o־YX�ߩv���u�j��nY��9#꺶g�v�

{χ�O1a�0���;�O��d���d�?�옎cE-���K��>�a�F���K6(�v6�)�c��ܟl([�p�@�v�$��h�o�P�7F+0��5��q������������?�핉{�&ARލp�a�{C��I��:~�����ΐf���Y����&�,nSyo��~ByHvOJ�̇�n���9����=��C�K�A%�n@&G�/�A�gV�>�N�*�ɚ��H�_ɃC����o��yP�m����Ĥ�C��P��0+m�&�Fv'�}i�`G����f� ����_ܝ����J}A�Z�.F͞��3Lˎ{.nn%O@ �g�Xj�.���yH|�w��G&�V!Ԧ@�������?=D�<�x$�6�!��H��8�(��C����m���<Q�3�rfK ������y/��K_�' X��5�>��4Ͳ���H(3D!�5�%�͞D�J^�Q��؍�K'&�1�&��\3��I�����w���4H��!-�i��+]!���*aX bf�J`�l/�KeI�wI���Y��y�S���=A/
�]�ҕ�D�}����)�!^����Hk�m� $M���\���٧
��i��H��I�������(�i(�+ ����ǥ�0�`�T�Ł)F����M��2�2Jܜ���������:+�;�I-cH�c8޲'��G�>�\�mW �]jΑM���+��=YW�=��}���=��]�(�^�ud������c��U���1�V�p4/sU�h���&��h5�T�EAq���B�[�^�����M��^�V����K�� ��j.j|�h���!�M�5����Z$�B�Q#�翡x�2;[@�8�8E�o@�3��:}-]����.�/�G]�:s��.	�<h#;C*5�qz���0[��{]�I�u,��ȵZ�,��Ù
�O%]���U�o�Z�PS8{���h�cq�C4|�6b��o���C+�s�������pN9�\elt����)�Df�g��{~T��&
A�t�5v�bE+m�L���#p��	"�#":�����?��j                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      x�Z]rIr����8k�I��vv H��)���8��j���.��0���?:|�~������/���)�cG������Ϟ�n����o��?�s��_�ܪ-�|Q���ku���ѓç���j���5ebԹ�S[�U��S?)����0ϕ,�Ti*S�3��Wg�T�MLQzWUƨ����jr��L&u�����'�&��+�����\���WUO<��կ��}zr1}y���b������?��n���^����i�����B��̙z��� t��R~���A�������W�b���:Y��x��*�T�v��z�-f�[WfB��Õ�q�^��-@ ��{���yU��%N����X�N� �"_����dp�̖��԰�\�>Bm�zn0yb��2W.1p�5e��x��Ing�=F�s������N�QW���F�v�y_�Y���Km��U�sF�FcbX�:��,l��bkըrfM]��~ �Ln�Gp����0*�8ނU�3����naf�U.�#א�2��K2�?�
ɉ�U@�-�NՅ�rWan\��b�Qa�Ij��xz��f�M�K�y>�;7�q�����g��akS%Ď�V'���6#�wQU�\W1�j�!A�ԍ:Ѹ,��M�P��l��vj뜻L
S�|�g�[��W���~�X��ܦ�6W�rf�3ms��z|Ү������j�.T�ڥjU.l�G
]��rye��^���C�da
��[��]�z�񊒶(�m�*�
�iT����z��� ��`�U^�T�@��w`¢���?�����Y尉[U�-��e�����-�4����:ws"u+p�ॿ�1U��PO�@1�#8: �2p���x���3��-E�CM�R�ҥj�1�1 k�ڀML��M	����J�m�����+��bY��]�a��Lo ԁlHu�c�|Bu*
-y��ڨ2�y���C�a()P��������d���Bqr;�����MF O1 �ea ��
r�W̰�u��ǋr��'��M1�;�A�&Q�KU/��q���ǁ�X��%��fFi�r���;�
1"�.�]SB��FWMi��)��Bj~�;訪:>&;X"����TK:�Hφ��P���7b_���0؜~4���<V;����Ѯ�ŮJ��j�?�?��]Y�J�$�����A���r�!Ryԧ㢀֘�V��,��.`]<�]F���C�
��T��-�u��BeNt
��K�D!|W�4��~ �}���T�����폃?�z�F���~��XnM;s`��oA��Nn1��a�Tl^���tל�-^F5bH<s�0���!a����崠E8��s'��3>#�2�lq�%g�#۝��3��#ќ=�G.=��<���o����V��o�x������><�g���w�㝁 �ˆ��ϲ�ly([Ȟ��'�@�l��
6��H�=�}�d_�q��P�=�}e�#��F�%��C�g��_��6�4A�U'
�� �4�ǀoHȿN%KR�	��@ �CH;�)��s`��6g`_2X0�'al��`�2]<��f��^�{7�!���RK^Ù$x��]QU���>dt{*��:T�Q�]���F�x��ʔ���n�)ࠉK�Hs�\4BV��n�<��݈� u�fmA�: ��s$�є���,�p՛�jrt�:\�H��Ap���CU_f��8AXr�JKԧ0C�zQ�f�P�n����"�n��
:[ Y'����L� ����4�%C ��CdG<�6,��H�9�x��弈/:�@����0Q%N���Ι!`%��=2�9r[Ȳ���r��uH
�TRc�n��1�^#�����df��-whլ�����m��h���H\��SW��	�I�B��� ��"zQA!��@�?�+]Q�/�&%�彯'��F�W�G�vJ�̠ܣ|E|v�*����R+�5X_�@�1v�|����
��}�C�&�����e����D��4LH�EνX{@h��5��T!}�/�'�	&JO�Tq�5�Gǝ.l�(37T%�k���f���%X�6ě��@���>p�N�s��;��� �&�'�Q���A�P�""�O��R��z�E�z `���Sn�'K�HUg�B���dt����n�rR�O�U.I���R���A�
C	�j�+o�+����ᕾ8ŵ,���gO������������3^� sp"�=tG��йr&��mL� �?qU���>:D�{U�7��*�X�	ⓚ�L��\!�7��H�Ũw!fy��Rq���Ft)�}��.���5�aշ뵞��iJ���J.�3�}��+�y�vN.~����킁�5Ei�*�H�^0b����d�쏃�d�W�� ��8��M��A�qd�%m�kF��	QKd�gZ�'���
	ID{�_H��G)�`~�B��"C�2�ř<�Q��d�PC*YD��B�DE�l�&�$�H��Q�UಅM�D�
1fCy8V�G��zڮh.��p�8��q��� Z����xҾ���A�}�
�K�q�8i4HM~%�#� A� ,F)ʽ�y�<�ʸ<�d�k�"θ@�X*q�?�sz{�j
�RtC��?^�0-X��U��,�3w�%�w�Op�����$��Z庝"�öhg�
��5I߿���'3�T	G�`4��*�ᦾٙ�0���%��
�#S��CHM��;6�Y�߲���6�ʭ�ՉY�`� 
�7��=
Rh�G����4pu8�!M����}�_/ ��cػYk�X��1!��yW� ��C�
�������S��*>	�3D�����B��dE*By�ښ2E�xx`M�P��0��$�V���͂i��>�u��	hG�����O!T��Ko����ç��i�e�&��/0���pg�D��+||��"'��Ry)>��M!��U"�*N���1ۆ��3r������_�ZX�	
���
�w9�Ê b�YW&)�)/̜���S�w��'�RD)���JZw��
���~^A仹k��[6�X��CL��2q(��|,�ϺH�3����H�c���\��6��X�l�
�>k����2x�)�/��i*U��$3�f��}��p�� 3'���ޘ��_���������tHP��g���������jW�I��?��x�\�:�(�<��Ç���                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         x�W�r�6�Y_��)�Prb'M̞��5q�Ll��#D@B�` P�����p�	����?���@*�(��"������.��J�9y|�웿�������t}cd�q�^~�?|x2>~x|����+ݘ\�s���
b�	�%z�'d�	�,1�
�|2"/�!J梲��+��ϲ˫l����j����i3���H�����X[;�A����h�2;�_/^Oj���+���{��"�L�fhB�&?���f���h����/U�P��ڻ�:aH.s���l�Oŗ��(g�j�a�N_�Sqf7)���� D�l��E��*q�*{�r��y�03Ngt
��p�2ˁ��)��YmSG���wP�]�1,��E#h�r'�Ӳq��^}�+!"��疫A&pS��{p��:0�6�>�# ���׻����{d�zжl ���p��w1Q��г�S��a��Ǿ���J@�DT��1���7L����F�D���;�@�Q�o����֑5$*D_�)��t���;2%[��_�k:��D�5������~�ٮ��@���IſH�h2
�QN��%2p�Vū�����d9��<����X�%���A�V�� �ېǾ>_���q��:�ކ�����w��e�V88��b��2��!֥�8%�t��a]1��+L�1e�Tb+:�LN�5<� �"��p���ָ)\��)<�!O1�0O�9��cG3�)�hEd� �<L.ɣN.��s_�h��%J�\��� �n6�AI���+�D���"Tc��~T����>5�7"��I�����! ���\�@����4���
�����T]0���"ֱ�=�
�4�)'O����ҏfp���h����3O�槯�|�#R�Ӯ��w�t|0�=;~t����|�Ȋ�~(���j8P�k؍PJ�)=�FZ
92D0,�5��z2c!�LS�X.�_��G��\�2%�26H&���Hq�m� ��9X��ɇ�媲ZR�f�k���Y}׬~4�7�_�������	�+�t�Y���Y�٬~H��w��Ц�k�m&.fX�?'%��$�$����b����o�bQCe�f|��MZ�� yJ
ZҒ@�@�a�h��C����	٨8-��O�:G`~z%6�|-� �ArD�T* �֮�x���'ט=2Ȗ���m𩮈����Bj��պ�y�z��g�"�d�_gz�`�)��Q�k=�X`�Eʠj��
���sx�C�

�����)�����䣚ͱ@�h���U�!daf4
���Y�N��Ғ�